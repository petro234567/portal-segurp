<?php

namespace App\Console\Commands;

use App\Models\ReceivedEmail;
use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;
use App\Models\ReceivedEmail;


class ReceiveEmails extends Command
{
    protected $signature = 'mail:receive';
    protected $description = 'Consulta el buzón IMAP y guarda mensajes nuevos';

    public function handle(): int
    {
        $client = Client::account('default');
        $client->connect();

        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->unseen()->limit(10)->get();

        foreach ($messages as $message) {
            $messageId = (string) $message->getMessageId();
            $from      = $message->getFrom()[0] ?? null;

            ReceivedEmail::firstOrCreate(
                ['message_id' => $messageId],
                [
                    'from_email'  => $from->mail ?? 'desconocido@desconocido.com',
                    'from_name'   => $from->personal ?? null,
                    'subject'     => (string) $message->getSubject(),
                    'body'        => (string) $message->getTextBody(),
                    'received_at' => $message->getDate()?->toDate(),
                ]
            );

            $message->setFlag(['Seen']);
            $this->line('Guardado: '.$message->getSubject());
        }

        return self::SUCCESS;
    }
}

class ReceivedEmailController extends Controller
{
    public function index()
    {
        $emails = ReceivedEmail::latest('received_at')->paginate(15);

        return view('emails.index', compact('emails'));
    }
}
