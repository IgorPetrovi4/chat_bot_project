<?php

namespace App\Command;

use App\Service\WebhookTelegram;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DeleteWebhookCommand extends Command
{


    private $webhookTelegram;

    public function __construct(WebhookTelegram $webhookTelegram)
    {
        $this->webhookTelegram = $webhookTelegram;
        parent::__construct();
    }

    protected static $defaultName = 'app:delete-webhook';

    protected function configure()
    {
        $this
            ->setDescription('Delete Webhook');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $rez = $this->webhookTelegram->deleteWebhook();
            $io->success('Webhook delete!'. $rez);
        return Command::SUCCESS;
    }
}
