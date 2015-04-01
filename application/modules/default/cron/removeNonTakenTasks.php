<?php

        $url = 'http://helpyou.by/cron-api/remove-non-taken-tasks/';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $token = json_decode(curl_exec($curl));
        curl_close($curl);

