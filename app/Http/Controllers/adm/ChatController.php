<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\chat;
use App\Models\student;

class ChatController extends Controller
{
    public function chats($sid)
    {
        $stdid=decrypt($sid);
        $stddet=student::select('id','name','mobile')->where('id',$stdid)->first();
        $chats=chat::where('sender','Admin')->Where('receiver',$stdid)->orWhere('sender',$stdid)->oldest()->get();
        $std = filter_var($stdid, FILTER_SANITIZE_NUMBER_INT);
        chat::where('sender', $std)->update([

            'visibility'=>'Seen',

        ]);


        return view('chat.Chats',['chats'=>$chats,'stdid'=>$stdid,'stddet'=>$stddet]);
    }

    public function send_msg(Request $req)
    {
        chat::create([

            'sender'=>'Admin',
            'msg'=>$req->msgtext,
            'status'=>'Active',
            'receiver'=>$req->stdid

        ]);

        $data['success']='success';
        echo json_encode($data);

    }

        public function all_chats(Request $req)
    {
        $stdid = $req->stdid;

        $chats=chat::where('sender','Admin')->Where('receiver',$stdid)->orWhere('sender',$stdid)->oldest()->get();
            $output = '';
           
            foreach($chats as $c)
            {
                if($c->sender!='Admin')
                {
                $output .= '  <div class="message-feed media">
            
                    <div class="pull-left" style="margin-right: 10px;">
                        
                    </div>
                    <div class="media-body">
                        <div class="mf-content">
                           '.$c->msg.'
                        </div>
                        <small class="mf-date"><i class="fa fa-clock-o"></i> '.date("d-m-Y H:i A", strtotime($c->created_at)).'</small>
                    </div>
                    </div>';
                }
                else
                {
                   $output .= '<div class="message-feed right">
                            <div class="media">
                                <div class="media-body">
                                    <div class="mf-content">
                                        '.$c->msg.'
                                    </div>
                                    <small class="mf-date"><i class="fa fa-clock-o"></i> '.date("d-m-Y H:i A", strtotime($c->created_at)).'</small>
                                </div>
                                <div class="pull-right" style="margin-left: 10px;">
                                <span class="img-avatar" style="cursor: pointer;" onclick="Delete('.$c->id.')"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>' ; 
                }
            

           
        }

                          
            
            echo $output;
    }

        public function delete_msg(Request $req)
    {
        chat::where('id',$req->body)->delete();

        $data['success']='success';
        echo json_encode($data);

    }
}
