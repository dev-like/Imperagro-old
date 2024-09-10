<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use InstagramScraper\Exception\InstagramAuthException;
use InstagramScraper\Exception\InstagramChallengeRecaptchaException;
use InstagramScraper\Exception\InstagramChallengeSubmitPhoneNumberException;
use InstagramScraper\Exception\InstagramException;
use InstagramScraper\Exception\InstagramNotFoundException;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use Psr\SimpleCache\InvalidArgumentException;

class ImagesFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws InstagramAuthException
     * @throws InstagramChallengeRecaptchaException
     * @throws InstagramChallengeSubmitPhoneNumberException
     * @throws InstagramException
     * @throws InstagramNotFoundException
     * @throws InvalidArgumentException
     */
    public function handle(): int
    {
        $instagram = Instagram::withCredentials(new Client(), 'like_dsg', 'like@@like123', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you want to force login $instagram->login(true)
        $instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
        $medias = $instagram->getMedias("imperagro", 10);

        $storage = Storage::disk('public_upload');
        \App\Models\Instagram::truncate();
        $files = $storage->allFiles('instagram');
        $storage->delete($files);


        foreach ($medias as $media) {
            $img = file_get_contents($media->getImageHighResolutionUrl());
            $nameFile = sprintf('instagram/%s.jpg', $media->getShortCode());
            $storage->put($nameFile, $img);
            \App\Models\Instagram::create([
                'image' => $nameFile,
                'description' => substr($media->getCaption(), 0, 500),
                'url' => $media->getLink(),
            ]);
        }

        return 0;
    }
}
