<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use Webklex\IMAP\Facades\Client;
use \Webklex\PHPIMAP\Support\FolderCollection;
use Carbon\Carbon;
class MailController extends Controller{

    public function index(Request $request){
        // dd(Carbon::now('+6:53')->format('Y-m-d H:i:s'));
        $client = Client::account('default');
        //Connect to the IMAP Server
        $client->connect();
        //Get all Mailboxes
        // $folders = $client->getFolders('');
        $folders = $client->getFolderByPath('Inbox');
        //Loop through every Mailbox
        $messages=$folders->messages()->since(Carbon::now('+5:53')->format('Y-m-d H:i:s'))->get();
        foreach($messages as $key => $message){
            echo 'Người gửi: '.$message->getFrom()[0]->mail.'<br />';
            echo 'id message: '.$message->getMessageId().'<br />';
            echo 'Tiêu đề: '.$message->getSubject().'<br />';
            echo 'Nội dung: '.$message->getHTMLBody().'<br />';
            echo 'Ngày gửi: '.$message->getDate().'<br />';
            if($message->hasAttachments()){
                $attachments = $message->getAttachments();
                echo 'Có '.$attachments->count().' tệp đính kèm<br/>';
                $count = 1;
                foreach($attachments as $key => $attachment){
                    $attributes = $attachment->getAttributes();
                    echo 'file '.($count).':<br/>';
                    echo '    type: '.$attachment->getExtension().'<br/>';
                    echo '    name: '.$attributes['name'].'<br/>';
                    $content = $attributes['content'];
                    $path = storage_path() .'/app/public/'. $attributes['name'];
                    file_put_contents($path, $content);
                    // dd($path);
                    $count++;
                    // dd($attributes,$attachment->getExtension());
                }
            }
            echo '<br/>';
            echo '<br/>';
        }
    }
    
}