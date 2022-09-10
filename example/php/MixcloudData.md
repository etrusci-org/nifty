# php / MixcloudData

## Files

- nifty / php / [MixcloudData.php](../../php/MixcloudData.php)

## Usage

```php
require_once 'MixcloudData.php';
```

```php
// create object
$MCD = new MixcloudData();
```

```php
// optionally override defaults
$MCD->cacheDir = '/tmp/mixcloud';
$MCD->errorFile = '/tmp/mixcloud/errors.log';
$MCD->cacheTTL = 86_400;
```

```php
// get a user profile
$user = $MCD->getUser(user: 'spartacus');

var_dump($user);
// expected output:
// array(21) {
//     ["key"]=>
//     string(11) "/spartacus/"
//     ["url"]=>
//     string(35) "https://www.mixcloud.com/spartacus/"
//     ["name"]=>
//     string(9) "Spartacus"
//     ["username"]=>
//     string(9) "spartacus"
//     ["pictures"]=>
//     array(8) {
//       ["small"]=>
//       string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["thumbnail"]=>
//       string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["medium_mobile"]=>
//       string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["medium"]=>
//       string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["large"]=>
//       string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["320wx320h"]=>
//       string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["extra_large"]=>
//       string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       ["640wx640h"]=>
//       string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//     }
//     ["biog"]=>
//     string(64) "Part of the Mixcloud team - since Mixcloud was just a good idea."
//     ["created_time"]=>
//     string(20) "2009-03-10T07:32:56Z"
//     ["updated_time"]=>
//     string(20) "2009-03-10T07:32:56Z"
//     ["follower_count"]=>
//     int(771)
//     ["following_count"]=>
//     int(101)
//     ["cloudcast_count"]=>
//     int(5)
//     ["favorite_count"]=>
//     int(73)
//     ["listen_count"]=>
//     int(2365)
//     ["is_pro"]=>
//     bool(true)
//     ["is_premium"]=>
//     bool(true)
//     ["city"]=>
//     string(6) "London"
//     ["country"]=>
//     string(14) "United Kingdom"
//     ["cover_pictures"]=>
//     array(3) {
//       ["835wx120h"]=>
//       string(106) "https://thumbnailer.mixcloud.com/unsafe/835x120/profile_cover/d/b/9/0/4328-5114-4c10-adcb-613d0c92337f.jpg"
//       ["1113wx160h"]=>
//       string(107) "https://thumbnailer.mixcloud.com/unsafe/1113x160/profile_cover/d/b/9/0/4328-5114-4c10-adcb-613d0c92337f.jpg"
//       ["1670wx240h"]=>
//       string(107) "https://thumbnailer.mixcloud.com/unsafe/1670x240/profile_cover/d/b/9/0/4328-5114-4c10-adcb-613d0c92337f.jpg"
//     }
//     ["picture_primary_color"]=>
//     string(6) "0c1711"
//     ["type"]=>
//     string(4) "user"
//     ["metadata"]=>
//     array(1) {
//       ["connections"]=>
//       array(8) {
//         ["cloudcasts"]=>
//         string(46) "https://api.mixcloud.com/spartacus/cloudcasts/"
//         ["comments"]=>
//         string(44) "https://api.mixcloud.com/spartacus/comments/"
//         ["favorites"]=>
//         string(45) "https://api.mixcloud.com/spartacus/favorites/"
//         ["feed"]=>
//         string(40) "https://api.mixcloud.com/spartacus/feed/"
//         ["followers"]=>
//         string(45) "https://api.mixcloud.com/spartacus/followers/"
//         ["following"]=>
//         string(45) "https://api.mixcloud.com/spartacus/following/"
//         ["listens"]=>
//         string(43) "https://api.mixcloud.com/spartacus/listens/"
//         ["playlists"]=>
//         string(45) "https://api.mixcloud.com/spartacus/playlists/"
//       }
//     }
// }
```

```php
// get a user's cloudcasts
$cloudcasts = $MCD->getCloudcasts(user: 'spartacus');

var_dump($cloudcasts);
// expected output:
// array(5) {
//     [0]=>
//     array(15) {
//       ["key"]=>
//       string(33) "/spartacus/cinematic-soundscapes/"
//       ["url"]=>
//       string(57) "https://www.mixcloud.com/spartacus/cinematic-soundscapes/"
//       ["name"]=>
//       string(21) "Cinematic Soundscapes"
//       ["tags"]=>
//       array(3) {
//         [0]=>
//         array(3) {
//           ["key"]=>
//           string(19) "/discover/chillout/"
//           ["url"]=>
//           string(43) "https://www.mixcloud.com/discover/chillout/"
//           ["name"]=>
//           string(8) "Chillout"
//         }
//         [1]=>
//         array(3) {
//           ["key"]=>
//           string(21) "/discover/soundtrack/"
//           ["url"]=>
//           string(45) "https://www.mixcloud.com/discover/soundtrack/"
//           ["name"]=>
//           string(10) "Soundtrack"
//         }
//         [2]=>
//         array(3) {
//           ["key"]=>
//           string(27) "/discover/modern-classical/"
//           ["url"]=>
//           string(51) "https://www.mixcloud.com/discover/modern-classical/"
//           ["name"]=>
//           string(16) "Modern classical"
//         }
//       }
//       ["created_time"]=>
//       string(20) "2014-09-10T14:42:03Z"
//       ["updated_time"]=>
//       string(20) "2014-09-10T14:16:00Z"
//       ["play_count"]=>
//       int(1326)
//       ["favorite_count"]=>
//       int(48)
//       ["comment_count"]=>
//       int(1)
//       ["listener_count"]=>
//       int(371)
//       ["repost_count"]=>
//       int(10)
//       ["pictures"]=>
//       array(10) {
//         ["small"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["thumbnail"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["medium_mobile"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["medium"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["320wx320h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["extra_large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["640wx640h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["768wx768h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//         ["1024wx1024h"]=>
//         string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/1/a/6/1/eaa7-151a-48a9-96f6-12df7773a25d.jpg"
//       }
//       ["slug"]=>
//       string(21) "cinematic-soundscapes"
//       ["user"]=>
//       array(5) {
//         ["key"]=>
//         string(11) "/spartacus/"
//         ["url"]=>
//         string(35) "https://www.mixcloud.com/spartacus/"
//         ["name"]=>
//         string(9) "Spartacus"
//         ["username"]=>
//         string(9) "spartacus"
//         ["pictures"]=>
//         array(8) {
//           ["small"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["thumbnail"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium_mobile"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["320wx320h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["extra_large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["640wx640h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         }
//       }
//       ["audio_length"]=>
//       int(2631)
//     }
//     [1]=>
//     array(15) {
//       ["key"]=>
//       string(30) "/spartacus/a-chilled-playlist/"
//       ["url"]=>
//       string(54) "https://www.mixcloud.com/spartacus/a-chilled-playlist/"
//       ["name"]=>
//       string(18) "A chilled playlist"
//       ["tags"]=>
//       array(4) {
//         [0]=>
//         array(3) {
//           ["key"]=>
//           string(19) "/discover/chillout/"
//           ["url"]=>
//           string(43) "https://www.mixcloud.com/discover/chillout/"
//           ["name"]=>
//           string(8) "Chillout"
//         }
//         [1]=>
//         array(3) {
//           ["key"]=>
//           string(15) "/discover/jazz/"
//           ["url"]=>
//           string(39) "https://www.mixcloud.com/discover/jazz/"
//           ["name"]=>
//           string(4) "Jazz"
//         }
//         [2]=>
//         array(3) {
//           ["key"]=>
//           string(18) "/discover/ambient/"
//           ["url"]=>
//           string(42) "https://www.mixcloud.com/discover/ambient/"
//           ["name"]=>
//           string(7) "Ambient"
//         }
//         [3]=>
//         array(3) {
//           ["key"]=>
//           string(27) "/discover/modern-classical/"
//           ["url"]=>
//           string(51) "https://www.mixcloud.com/discover/modern-classical/"
//           ["name"]=>
//           string(16) "Modern classical"
//         }
//       }
//       ["created_time"]=>
//       string(20) "2014-08-27T13:15:44Z"
//       ["updated_time"]=>
//       string(20) "2014-08-27T13:08:59Z"
//       ["play_count"]=>
//       int(2393)
//       ["favorite_count"]=>
//       int(126)
//       ["comment_count"]=>
//       int(8)
//       ["listener_count"]=>
//       int(940)
//       ["repost_count"]=>
//       int(22)
//       ["pictures"]=>
//       array(10) {
//         ["small"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["thumbnail"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["medium_mobile"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["medium"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["320wx320h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["extra_large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["640wx640h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["768wx768h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//         ["1024wx1024h"]=>
//         string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/0/0/b/e/3819-dc71-4deb-bdc6-fb8069d5f8fe.jpg"
//       }
//       ["slug"]=>
//       string(18) "a-chilled-playlist"
//       ["user"]=>
//       array(5) {
//         ["key"]=>
//         string(11) "/spartacus/"
//         ["url"]=>
//         string(35) "https://www.mixcloud.com/spartacus/"
//         ["name"]=>
//         string(9) "Spartacus"
//         ["username"]=>
//         string(9) "spartacus"
//         ["pictures"]=>
//         array(8) {
//           ["small"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["thumbnail"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium_mobile"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["320wx320h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["extra_large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["640wx640h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         }
//       }
//       ["audio_length"]=>
//       int(4567)
//     }
//     [2]=>
//     array(15) {
//       ["key"]=>
//       string(19) "/spartacus/0xf4240/"
//       ["url"]=>
//       string(43) "https://www.mixcloud.com/spartacus/0xf4240/"
//       ["name"]=>
//       string(7) "0xf4240"
//       ["tags"]=>
//       array(3) {
//         [0]=>
//         array(3) {
//           ["key"]=>
//           string(24) "/discover/electro-house/"
//           ["url"]=>
//           string(48) "https://www.mixcloud.com/discover/electro-house/"
//           ["name"]=>
//           string(13) "Electro house"
//         }
//         [1]=>
//         array(3) {
//           ["key"]=>
//           string(21) "/discover/deep-house/"
//           ["url"]=>
//           string(45) "https://www.mixcloud.com/discover/deep-house/"
//           ["name"]=>
//           string(10) "Deep house"
//         }
//         [2]=>
//         array(3) {
//           ["key"]=>
//           string(21) "/discover/tech-house/"
//           ["url"]=>
//           string(45) "https://www.mixcloud.com/discover/tech-house/"
//           ["name"]=>
//           string(10) "Tech house"
//         }
//       }
//       ["created_time"]=>
//       string(20) "2011-04-23T00:16:32Z"
//       ["updated_time"]=>
//       string(20) "2013-10-15T23:36:44Z"
//       ["play_count"]=>
//       int(958)
//       ["favorite_count"]=>
//       int(18)
//       ["comment_count"]=>
//       int(3)
//       ["listener_count"]=>
//       int(175)
//       ["repost_count"]=>
//       int(1)
//       ["pictures"]=>
//       array(10) {
//         ["small"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["thumbnail"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["medium_mobile"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["medium"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["320wx320h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["extra_large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["640wx640h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["768wx768h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//         ["1024wx1024h"]=>
//         string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/3/d/4/4/7800-ca46-461f-a2ec-15092505fe72.jpg"
//       }
//       ["slug"]=>
//       string(7) "0xf4240"
//       ["user"]=>
//       array(5) {
//         ["key"]=>
//         string(11) "/spartacus/"
//         ["url"]=>
//         string(35) "https://www.mixcloud.com/spartacus/"
//         ["name"]=>
//         string(9) "Spartacus"
//         ["username"]=>
//         string(9) "spartacus"
//         ["pictures"]=>
//         array(8) {
//           ["small"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["thumbnail"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium_mobile"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["320wx320h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["extra_large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["640wx640h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         }
//       }
//       ["audio_length"]=>
//       int(2756)
//     }
//     [3]=>
//     array(15) {
//       ["key"]=>
//       string(21) "/spartacus/lambiance/"
//       ["url"]=>
//       string(45) "https://www.mixcloud.com/spartacus/lambiance/"
//       ["name"]=>
//       string(10) "L'ambiance"
//       ["tags"]=>
//       array(3) {
//         [0]=>
//         array(3) {
//           ["key"]=>
//           string(14) "/discover/idm/"
//           ["url"]=>
//           string(38) "https://www.mixcloud.com/discover/idm/"
//           ["name"]=>
//           string(3) "IDM"
//         }
//         [1]=>
//         array(3) {
//           ["key"]=>
//           string(20) "/discover/originals/"
//           ["url"]=>
//           string(44) "https://www.mixcloud.com/discover/originals/"
//           ["name"]=>
//           string(9) "Originals"
//         }
//         [2]=>
//         array(3) {
//           ["key"]=>
//           string(18) "/discover/ambient/"
//           ["url"]=>
//           string(42) "https://www.mixcloud.com/discover/ambient/"
//           ["name"]=>
//           string(7) "Ambient"
//         }
//       }
//       ["created_time"]=>
//       string(20) "2010-03-11T21:53:08Z"
//       ["updated_time"]=>
//       string(20) "2013-11-27T09:25:50Z"
//       ["play_count"]=>
//       int(1262)
//       ["favorite_count"]=>
//       int(25)
//       ["comment_count"]=>
//       int(7)
//       ["listener_count"]=>
//       int(204)
//       ["repost_count"]=>
//       int(0)
//       ["pictures"]=>
//       array(10) {
//         ["small"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["thumbnail"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["medium_mobile"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["medium"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["320wx320h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["extra_large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["640wx640h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["768wx768h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//         ["1024wx1024h"]=>
//         string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/f/7/2/8/7047-1761-453b-a88a-e6176e4a52aa.jpg"
//       }
//       ["slug"]=>
//       string(9) "lambiance"
//       ["user"]=>
//       array(5) {
//         ["key"]=>
//         string(11) "/spartacus/"
//         ["url"]=>
//         string(35) "https://www.mixcloud.com/spartacus/"
//         ["name"]=>
//         string(9) "Spartacus"
//         ["username"]=>
//         string(9) "spartacus"
//         ["pictures"]=>
//         array(8) {
//           ["small"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["thumbnail"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium_mobile"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["320wx320h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["extra_large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["640wx640h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         }
//       }
//       ["audio_length"]=>
//       int(3902)
//     }
//     [4]=>
//     array(15) {
//       ["key"]=>
//       string(22) "/spartacus/party-time/"
//       ["url"]=>
//       string(46) "https://www.mixcloud.com/spartacus/party-time/"
//       ["name"]=>
//       string(10) "Party Time"
//       ["tags"]=>
//       array(3) {
//         [0]=>
//         array(3) {
//           ["key"]=>
//           string(22) "/discover/funky-house/"
//           ["url"]=>
//           string(46) "https://www.mixcloud.com/discover/funky-house/"
//           ["name"]=>
//           string(11) "Funky house"
//         }
//         [1]=>
//         array(3) {
//           ["key"]=>
//           string(15) "/discover/funk/"
//           ["url"]=>
//           string(39) "https://www.mixcloud.com/discover/funk/"
//           ["name"]=>
//           string(4) "Funk"
//         }
//         [2]=>
//         array(3) {
//           ["key"]=>
//           string(15) "/discover/soul/"
//           ["url"]=>
//           string(39) "https://www.mixcloud.com/discover/soul/"
//           ["name"]=>
//           string(4) "Soul"
//         }
//       }
//       ["created_time"]=>
//       string(20) "2009-08-02T16:55:01Z"
//       ["updated_time"]=>
//       string(20) "2013-10-15T13:48:53Z"
//       ["play_count"]=>
//       int(8811)
//       ["favorite_count"]=>
//       int(38)
//       ["comment_count"]=>
//       int(4)
//       ["listener_count"]=>
//       int(297)
//       ["repost_count"]=>
//       int(7)
//       ["pictures"]=>
//       array(10) {
//         ["small"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["thumbnail"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["medium_mobile"]=>
//         string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["medium"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["320wx320h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["extra_large"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["640wx640h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["768wx768h"]=>
//         string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//         ["1024wx1024h"]=>
//         string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       }
//       ["slug"]=>
//       string(10) "party-time"
//       ["user"]=>
//       array(5) {
//         ["key"]=>
//         string(11) "/spartacus/"
//         ["url"]=>
//         string(35) "https://www.mixcloud.com/spartacus/"
//         ["name"]=>
//         string(9) "Spartacus"
//         ["username"]=>
//         string(9) "spartacus"
//         ["pictures"]=>
//         array(8) {
//           ["small"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["thumbnail"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium_mobile"]=>
//           string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["medium"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["320wx320h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["extra_large"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//           ["640wx640h"]=>
//           string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         }
//       }
//       ["audio_length"]=>
//       int(3361)
//     }
// }
```

```php
// get a show
$show = $MCD->getShow(user: 'spartacus', slug: 'party-time');

var_dump($show);
// expected output:
// array(20) {
//     ["key"]=>
//     string(22) "/spartacus/party-time/"
//     ["url"]=>
//     string(46) "https://www.mixcloud.com/spartacus/party-time/"
//     ["name"]=>
//     string(10) "Party Time"
//     ["tags"]=>
//     array(3) {
//       [0]=>
//       array(4) {
//         ["key"]=>
//         string(22) "/discover/funky-house/"
//         ["url"]=>
//         string(46) "https://www.mixcloud.com/discover/funky-house/"
//         ["name"]=>
//         string(11) "Funky house"
//         ["type"]=>
//         string(3) "tag"
//       }
//       [1]=>
//       array(4) {
//         ["key"]=>
//         string(15) "/discover/funk/"
//         ["url"]=>
//         string(39) "https://www.mixcloud.com/discover/funk/"
//         ["name"]=>
//         string(4) "Funk"
//         ["type"]=>
//         string(3) "tag"
//       }
//       [2]=>
//       array(4) {
//         ["key"]=>
//         string(15) "/discover/soul/"
//         ["url"]=>
//         string(39) "https://www.mixcloud.com/discover/soul/"
//         ["name"]=>
//         string(4) "Soul"
//         ["type"]=>
//         string(3) "tag"
//       }
//     }
//     ["created_time"]=>
//     string(20) "2009-08-02T16:55:01Z"
//     ["updated_time"]=>
//     string(20) "2013-10-15T13:48:53Z"
//     ["play_count"]=>
//     int(8811)
//     ["favorite_count"]=>
//     int(38)
//     ["comment_count"]=>
//     int(4)
//     ["listener_count"]=>
//     int(297)
//     ["repost_count"]=>
//     int(7)
//     ["pictures"]=>
//     array(10) {
//       ["small"]=>
//       string(99) "https://thumbnailer.mixcloud.com/unsafe/25x25/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["thumbnail"]=>
//       string(99) "https://thumbnailer.mixcloud.com/unsafe/50x50/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["medium_mobile"]=>
//       string(99) "https://thumbnailer.mixcloud.com/unsafe/80x80/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["medium"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/100x100/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["large"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/300x300/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["320wx320h"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/320x320/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["extra_large"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/600x600/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["640wx640h"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/640x640/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["768wx768h"]=>
//       string(101) "https://thumbnailer.mixcloud.com/unsafe/768x768/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//       ["1024wx1024h"]=>
//       string(103) "https://thumbnailer.mixcloud.com/unsafe/1024x1024/extaudio/6/1/a/1/279f-e3c0-4871-aa8e-c4cf5466edb8.png"
//     }
//     ["slug"]=>
//     string(10) "party-time"
//     ["user"]=>
//     array(6) {
//       ["key"]=>
//       string(11) "/spartacus/"
//       ["url"]=>
//       string(35) "https://www.mixcloud.com/spartacus/"
//       ["name"]=>
//       string(9) "Spartacus"
//       ["username"]=>
//       string(9) "spartacus"
//       ["pictures"]=>
//       array(8) {
//         ["small"]=>
//         string(94) "https://thumbnailer.mixcloud.com/unsafe/25x25/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["thumbnail"]=>
//         string(94) "https://thumbnailer.mixcloud.com/unsafe/50x50/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["medium_mobile"]=>
//         string(94) "https://thumbnailer.mixcloud.com/unsafe/80x80/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["medium"]=>
//         string(96) "https://thumbnailer.mixcloud.com/unsafe/100x100/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["large"]=>
//         string(96) "https://thumbnailer.mixcloud.com/unsafe/300x300/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["320wx320h"]=>
//         string(96) "https://thumbnailer.mixcloud.com/unsafe/320x320/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["extra_large"]=>
//         string(96) "https://thumbnailer.mixcloud.com/unsafe/600x600/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//         ["640wx640h"]=>
//         string(96) "https://thumbnailer.mixcloud.com/unsafe/640x640/profile/2/7/9/e/c70a-cdba-4fb6-a57d-c16f5520fdc9"
//       }
//       ["type"]=>
//       string(4) "user"
//     }
//     ["audio_length"]=>
//     int(3361)
//     ["description"]=>
//     string(219) "Given I'm on the Mixcloud team, I thought I really should have something up here.  Here's an hour's worth of funky music to get you ready for partying, enjoy the music and ignore the quality (or lack thereof) of the DJ!"
//     ["sections"]=>
//     array(0) {
//     }
//     ["picture_primary_color"]=>
//     string(6) "040002"
//     ["type"]=>
//     string(9) "cloudcast"
//     ["metadata"]=>
//     array(1) {
//       ["connections"]=>
//       array(4) {
//         ["favorites"]=>
//         string(56) "https://api.mixcloud.com/spartacus/party-time/favorites/"
//         ["listeners"]=>
//         string(56) "https://api.mixcloud.com/spartacus/party-time/listeners/"
//         ["comments"]=>
//         string(55) "https://api.mixcloud.com/spartacus/party-time/comments/"
//         ["similar"]=>
//         string(54) "https://api.mixcloud.com/spartacus/party-time/similar/"
//       }
//     }
// }
```
