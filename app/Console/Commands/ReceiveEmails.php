<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;

class ReceiveEmails extends Command
{
    protected $signature = 'mail:receive';
    protected $description = 'Consulta el buzón IMAP y muestra mensajes nuevos';

    public function handle(): int
    {
        $client = Client::account('default');
        $client->connect();

        $folder = $client->getFolder('INBOX');

        $messages = $folder->messages()
            ->unseen()
            ->limit(10)
            ->get();

        foreach ($messages as $message) {
            $this->line('Asunto: '.$message->getSubject());
            $this->line('De: '.$message->getFrom()[0]->mail ?? '');
            $this->line('Fecha: '.$message->getDate());

            $message->setFlag(['Seen']);
    }
    
    return self::SUCCESS;

    }
}
