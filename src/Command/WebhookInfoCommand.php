<?php

namespace App\Command;

use App\Service\WebhookTelegram;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class WebhookInfoCommand extends Command
{

    private $webhookTelegram;

    public function __construct(WebhookTelegram $webhookTelegram)
    {
        $this->webhookTelegram = $webhookTelegram;
        parent::__construct();
    }

    protected static $defaultName = 'app:webhook-info';

    protected function configure()
    {
        $this
            ->setDescription('Webhook Info');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $rez = $this->webhookTelegram->WebhookInfo();
            $io->success('Webhook info '.$rez);





        return Command::SUCCESS;
    }
}
