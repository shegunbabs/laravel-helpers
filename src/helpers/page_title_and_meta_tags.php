<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

function page_title_and_meta_tags($url, $meta_tags = ['description'])
{
    try {
        $client = new Client();
        $request = $client->get($url);
        $body = (string) $request->getBody();

        $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $body, $matches) ? $matches[1] : null;
        preg_match_all("/<meta[\s?]name=[\"?](.*?)[\"?][\s?]content=[\"?](.*?\s*?)[\"?][\s*>*]/", $body, $matches);
        $result = array_combine($matches[1], $matches[2]);

        $return['title'] = $title ?? "";

        foreach ($meta_tags as $meta_tag) {
            $return[$meta_tag] = $result[$meta_tag] ?? "";
        }

        return $return;

    } catch (ClientException $e) {
        return [];
    }
}