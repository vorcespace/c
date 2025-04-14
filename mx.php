<?php
function generateMetaTags($htmlContent) {
    $text = strip_tags($htmlContent);
    $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = preg_replace('/\s+/', ' ', $text);
    $text = trim($text);
    $description = mb_substr($text, 0, 160);
    if (mb_strlen($text) > 160) {
        $description .= '...';
    }
    $textLower = mb_strtolower($text);
    $textLower = preg_replace('/[^\p{L}\p{N}\s]/u', '', $textLower);
    $words = explode(' ', $textLower);
    $stopWords = ['the', 'and', 'a', 'an', 'of', 'in', 'on', 'for', 'to', 'with', 'is', 'are', 'by', 'it', 'this', 'that', 'at', 'from', 'as', 'be', 'was', 'were', 'or'];
    $filteredWords = array_filter($words, function($word) use ($stopWords) {
        return strlen($word) > 3 && !in_array($word, $stopWords);
    });
    $wordFrequency = array_count_values($filteredWords);
    arsort($wordFrequency);
    $keywords = array_slice(array_keys($wordFrequency), 0, 10);
    $keywordsString = implode(', ', $keywords);
    return [
        'description' => $description,
        'keywords' => $keywordsString
    ];
}

$json_url = 'https://raw.githubusercontent.com/vorcespace/c/refs/heads/main/articles.json';
$json_data = file_get_contents($json_url);
$articles = json_decode($json_data, true);

$p = [
    'online-casino-malaysia' => '🎰 Explore Online Casinos in Malaysia',
    'trusted-online-casino-malaysia' => '✅ Find Trusted Online Casinos in Malaysia',
    '918kiss-casino' => '💎 Play 918Kiss Slots - Malaysia',
    'live-casino-malaysia' => '📹 Live Casino Experience in Malaysia',
    'best-online-slots-malaysia' => '🎲 Best Online Slot Games in Malaysia',
    'scr888-malaysia' => '🔥 SCR888 Slots - Spin & Win in Malaysia',
    'mobile-casino-malaysia' => '📱 Top Mobile Casino Games in Malaysia',
    'casino-malaysia-free-credit' => '💰 Grab Free Credit at Online Casinos in Malaysia',
    'new-online-casino-malaysia' => '🌟 New Online Casinos to Try in Malaysia',
    'mega888-malaysia' => '💥 Mega888 Casino - Play and Win!',
    'rollex11-casino' => '🏆 Rollex11 - Trusted Casino in Malaysia',
    'evo888-malaysia' => '🎮 EVO888 Slots - Jackpot Awaits!',
    'top-online-casino-malaysia' => '🎯 Discover Top Casinos in Malaysia',
    'best-casino-bonuses-malaysia' => '🎁 Best Casino Bonuses in Malaysia for 2025',
    'big-win-casino-malaysia' => '💸 Big Wins at Online Casinos in Malaysia',
    'live-dealer-casino-malaysia' => '🃏 Live Dealer Action - Casino Malaysia',
    'online-slots-malaysia' => '🎰 Spin Online Slots - Big Wins in Malaysia',
    'casino-game-malaysia' => '🕹️ Explore Casino Games in Malaysia',
    'real-money-casino-malaysia' => '💵 Real Money Casino Fun in Malaysia',
    'slot-machines-malaysia' => '🎰 Top Slot Machines in Malaysia',
    'safe-online-casino-malaysia' => '🔒 Play Safely at Online Casinos in Malaysia',
    'high-roller-casino-malaysia' => '💎 High Roller Casinos in Malaysia',
    'mobile-casino-bonus-malaysia' => '🎁 Get Mobile Casino Bonuses in Malaysia',
    'new-casino-games-malaysia' => '🎲 Check Out New Casino Games in Malaysia',
    'cuci2-online-casino-malaysia' => '🚀 Cuci2 - Exciting Online Casino Malaysia',
    'padubet-online-casino-malaysia' => '🃏 Padubet Casino - Best of Malaysia',
    'lv99login-online-casino-malaysia' => '🔑 LV99 Login - Access Top Casino Games',
    'million88-online-casino-malaysia' => '💎 Million88 - Win Big at Malaysian Casino',
    'i1malaysia-online-casino-malaysia' => '🔥 Play at i1Malaysia Casino - Big Prizes',
    'bk8asiane-wallet-casino-malaysia' => '💳 BK8 AsianE Wallet Casino Malaysia',
    'scrplay1-online-casino-malaysia' => '🎯 SCRPlay1 Casino - Malaysian Gaming Hub',
    '99kopitiam-casino-malaysia' => '☕ 99Kopitiam - Relax & Win at Casino',
    'lucky555-casino-malaysia' => '🍀 Lucky 555 - Malaysian Online Casino',
    'kedaimesinregister-online-casino-malaysia' => '🔑 Register at KedaiMesin Casino',
    'mybos-online-casino-malaysia' => '💻 MyBOS - Malaysia Online Casino Site',
    'super222-casino-malaysia' => '🌟 Super222 Casino - Ultimate Winning Experience',
    'rm100k-online-casino-malaysia' => '💰 RM100K Jackpot - Malaysia Casino Rewards',
    'ultra66-online-casino-malaysia' => '⚡ Ultra66 - Top Casino in Malaysia',
    'cashkingbet-online-casino-malaysia' => '👑 Cash King Bet - Malaysia’s Royal Casino',
    'jdl996-online-casino-malaysia' => '🎯 JDL996 - Winning Casino Games in Malaysia',
    'itrust88myen-us-casino-malaysia' => '🔒 iTrust88 - Secure Casino in Malaysia',
    'v3377-online-casino-malaysia' => '🎰 V3377 - Exciting Casino Games in Malaysia',
    'bbclubs-casino-malaysia' => '🎮 BBClubs - Join the Winning Team',
    'gdl88-online-casino-malaysia' => '🔥 GDL88 - Best Slots in Malaysia',
    'won555-casino-malaysia' => '🏆 Won555 - Big Prizes, Big Fun',
    'rxz135-online-casino-malaysia' => '🚀 RXZ135 - Malaysia’s Fast-Paced Casino',
    'u9play-online-casino-malaysia' => '🎮 U9Play - Fun Casino Games Online',
    'jadiking8-casino-malaysia' => '👑 JADIking8 - Win Like a King',
    'we88my1-casino-malaysia' => '🎯 WE88MY1 - Play, Win, Repeat',
    'myberlian88-casino-malaysia' => '💎 MyBerlian88 - Sparkling Online Casino',
    'bearbrick888g-casino-malaysia' => '🐻 BearBrick888G - Relax & Win Big',
    'pavillion88-casino-malaysia' => '🏛️ Pavillion88 - A Place to Play & Win',
    'lvwin88-online-casino-malaysia' => '💰 LVWin88 - Top Slots in Malaysia',
    'liverpool888c-casino-malaysia' => '⚽ Liverpool888C - Football & Casino Fun',
    'judikiss88g-casino-malaysia' => '💋 JudiKiss88G - Kiss Your Way to Big Wins',
    'starbucks88-casino-malaysia' => '☕ Starbucks88 - Relax & Play Casino',
    '12play15my-casino-malaysia' => '🎲 12Play15MY - Casino Entertainment Malaysia',
    'babyshark22i-casino-malaysia' => '🦈 BabyShark22i - Big Wins for All!',
    'lepak44-casino-malaysia' => '💣 Lepak44 - Chill and Win',
    'waja33-casino-malaysia' => '💥 Waja33 - Your Ultimate Casino Escape',
    'boss188wow-casino-malaysia' => '🎮 Boss188Wow - Where Winners Play',
    'ppn88c-casino-malaysia' => '🎯 PPN88C - Malaysia’s Premium Casino',
    'i3malaysia-casino-malaysia' => '⚡ I3Malaysia - Your Casino Adventure Awaits',
    '999joker-online-casino-malaysia' => '🎰 999Joker - Jackpot Casino Fun',
    'i8betmy-casino-malaysia' => '🎲 i8BetMY - Big Slots, Bigger Wins',
    'maxim88mysen-myhome-online-casino-malaysia' => '🏠 Maxim88MYSen - Your Home for Online Wins',
    'mobile99winmyenhome-casino-malaysia' => '📱 Mobile99WinMYEN - Casino on the Go',
    'aceofficial2-casino-malaysia' => '♠️ AceOfficial2 - Winning Slots in Malaysia',
    'euwinweben-my-casino-malaysia' => '🌐 EUWinWebEN - Secure Malaysian Casino',
    'jqk-online-casino-malaysia' => '🎰 JQK - Jackpot Slots Malaysia',
    'wc88my-casino-malaysia' => '🎲 WC88MY - Top-Rated Casino in Malaysia',
    'genting888a-casino-malaysia' => '🏆 Genting888A - World-Class Casino in Malaysia',
    'b9myr2-casino-malaysia' => '🚀 B9MYR2 - Play to Win Big!',
    'u88live-casino-malaysia' => '🔥 U88Live - Live Casino Excitement',
    'winw88-online-casino-malaysia' => '🏆 WinW88 - Top Casino Entertainment',
    'egm8my-casino-malaysia' => '🎰 EGM8MY - Spin & Win in Malaysia',
    'ibw2uenhome-casino-malaysia' => '🏠 IBW2UENHome - Home of Winning Casinos',
    'me88wins-online-casino-malaysia' => '💎 ME88Wins - Top Casino Jackpot',
    'deluxewin7-casino-malaysia' => '🎲 DeluxeWin7 - Exclusive Casino Malaysia',
    'blwclub-casino-malaysia' => '🎮 BLWClub - Your Casino Destination',
    'funcity33s-casino-malaysia' => '⚡ FunCity33S - Fun and Fast Casino Wins',
    '3win2u-casino-malaysia' => '🎰 3Win2U - Triple the Fun, Triple the Wins',
    'mas9myenhome-casino-malaysia' => '🏠 MAS9MYENHome - Your Gateway to Big Wins',
    'lvking333-online-casino-malaysia' => '👑 LVKing333 - Win Like a King',
    'weclubmy-casino-malaysia' => '🎲 WEClubMY - Play with the Best in Malaysia',
    'a66-casino-malaysia' => '🎯 A66 Casino - Top Online Slots',
    'tony99mys-casino-malaysia' => '🎰 Tony99MYS - Play & Win!',
    'surewinnow-casino-malaysia' => '⚡ SureWinNow - Winning Made Easy',
    'kkslots168-casino-malaysia' => '🎮 KKSlots168 - Malaysia’s Best Slots',
    '7slotsms-casino-malaysia' => '🎰 7SlotsMS - Spin & Win Big',
    'pakarjudi8-casino-malaysia' => '🃏 PakarJudi8 - Malaysia’s Expert Casino',
    'enjoy11my-casino-malaysia' => '🎉 Enjoy11MY - Play & Win Every Time',
    'rai88malaysia-online-casino-malaysia' => '🎯 RAI88Malaysia - Top Slots & Casino',
    'uw99my-casino-malaysia' => '🃏 UW99MY - Join the Winning Team',
    'ecity666-casino-malaysia' => '🎮 eCity666 - Top Casino Entertainment',
    'md88mys-casino-malaysia' => '🎰 MD88MYS - Malaysia’s Premier Casino',
    'm8mys-online-casino-malaysia' => '🎲 M8MYS - Casino Fun at Its Best',
    'god55-casino-malaysia' => '🛡️ God55 - Your Trusted Casino in Malaysia',
    'ezg88myr-casino-malaysia' => '💎 EZG88MYR - Spin & Win at EZ Casino',
    'mu33ag-casino-malaysia' => '🚀 MU33AG - Win Big with MU33AG',
    'arc988-online-casino-malaysia' => '🎰 ARC988 - Big Wins Await!',
    'ekplus8-casino-malaysia' => '🔥 EKPlus8 - Play and Win',
    'yes666-casino-malaysia' => '✅ YES666 - Malaysian Casino Excellence',
    'mycasinojr-casino-malaysia' => '🃏 MyCasinoJR - Jackpot Awaits!',
    'mmc888-casino-malaysia' => '🎯 MMC888 - Play Now & Win Big',
    'eu9my7-casino-malaysia' => '🔥 EU9MY7 - Top Online Casino Malaysia',
    '96msia-casino-malaysia' => '🎰 96MSIA - Top Slots, Big Prizes',
    'bvbx2-casino-malaysia' => '⚡ BVBX2 - Casino Excitement in Malaysia',
    'bp77asian-casino-malaysia' => '🌏 BP77Asian - Global Casino Fun',
    'payung99c-casino-malaysia' => '🎲 Payung99C - Malaysia’s Best Casino',
    'ocmy8-casino-malaysia' => '🎯 OCMY8 - Enjoy Top Casino Games',
    'best-casino-games-malaysia' => '🏆 Best Casino Games in Malaysia 2025',
    'best-online-casino-bonuses-malaysia' => '🎁 Best Casino Bonuses - Malaysia 2025',
    'top-rated-online-casinos-malaysia' => '🔥 Top Rated Online Casinos in Malaysia',
    'trusted-casino-websites-malaysia' => '✅ Trusted Casino Sites in Malaysia',
    'online-casino-deals-malaysia' => '💸 Best Casino Deals in Malaysia',
    'casino-sign-up-bonuses-malaysia' => '🎁 Sign-Up Bonuses at Casinos Malaysia',
    'high-payout-casinos-malaysia' => '💰 High Payout Casinos in Malaysia',
    'new-casino-sites-malaysia' => '🆕 New Casinos in Malaysia 2025',
    'best-casino-promotions-malaysia' => '🎉 Top Casino Promotions in Malaysia',
    'casino-jackpots-malaysia' => '💰 Huge Casino Jackpots in Malaysia',
    'online-casino-guide-malaysia' => '🎮 Ultimate Online Casino Guide - Malaysia',
    'online-casino-games-malaysia' => '🎲 Best Casino Games in Malaysia'
];


if (isset($_GET['p']) && array_key_exists($_GET['p'], $articles)) {
    $slug = $_GET['p'];
    $title = isset($p[$slug]) ? $p[$slug] : ucfirst(str_replace('-', ' ', $slug));
    $article = $articles[$slug]['content'];
    $meta = generateMetaTags($article);
$desc = htmlspecialchars($meta['description'], ENT_QUOTES);
$key =  htmlspecialchars($meta['keywords'], ENT_QUOTES);
} else {
    $random_key = array_rand($articles);
    $article = $articles[$random_key]['content'];
    $title = isset($p[$random_key]) ? $p[$random_key] : '🎲 Discover Top Online Casinos in Malaysia'; 
    $meta = generateMetaTags($article);
$desc = htmlspecialchars($meta['description'], ENT_QUOTES);
$key =  htmlspecialchars($meta['keywords'], ENT_QUOTES);
}
echo '<!doctype html>
<html amp i-amphtml-layout lang=en style="padding-top:32px;" transformed="google;v=8">
   <head>
      <meta charset=utf-8>
      <meta content="width=device-width" name=viewport>
      <style amp-runtime i-amphtml-version=012503242227000>
         html{overflow-x:hidden!important}
         html.i-amphtml-fie{height:100%!important;width:100%!important}
         html:not([amp4ads]),html:not([amp4ads]) 
         body{height:auto!important}
         html:not([amp4ads]) 
         body{margin:0!important}
         body{-webkit-text-size-adjust:100%;-moz-text-size-adjust:100%;-ms-text-size-adjust:100%;text-size-adjust:100%}
         html.i-amphtml-singledoc.i-amphtml-embedded{-ms-touch-action:pan-y pinch-zoom;touch-action:pan-y pinch-zoom}
         html.i-amphtml-fie>body,html.i-amphtml-singledoc>body{overflow:visible!important}
         html.i-amphtml-fie:not(.i-amphtml-inabox)>body,html.i-amphtml-singledoc:not(.i-amphtml-inabox)>body{position:relative!important}
         html.i-amphtml-ios-embed-legacy>body{overflow-x:hidden!important;overflow-y:auto!important;position:absolute!important}html.i-amphtml-ios-embed{overflow-y:auto!important;position:static}#i-amphtml-wrapper{overflow-x:hidden!important;overflow-y:auto!important;position:absolute!important;top:0!important;left:0!important;right:0!important;bottom:0!important;margin:0!important;display:block!important}html.i-amphtml-ios-embed.i-amphtml-ios-overscroll,html.i-amphtml-ios-embed.i-amphtml-ios-overscroll>#i-amphtml-wrapper{-webkit-overflow-scrolling:touch!important}#i-amphtml-wrapper>body{position:relative!important;border-top:1px solid transparent!important}#i-amphtml-wrapper+body{visibility:visible}#i-amphtml-wrapper+body .i-amphtml-lightbox-element,#i-amphtml-wrapper+body[i-amphtml-lightbox]{visibility:hidden}#i-amphtml-wrapper+body[i-amphtml-lightbox] .i-amphtml-lightbox-element{visibility:visible}#i-amphtml-wrapper.i-amphtml-scroll-disabled,.i-amphtml-scroll-disabled{overflow-x:hidden!important;overflow-y:hidden!important}amp-instagram{padding:54px 0px 0px!important;background-color:#fff}amp-iframe iframe{box-sizing:border-box!important}[amp-access][amp-access-hide]{display:none}[subscriptions-dialog],body:not(.i-amphtml-subs-ready) [subscriptions-action],body:not(.i-amphtml-subs-ready) [subscriptions-section]{display:none!important}amp-experiment,amp-live-list>[update]{display:none}amp-list[resizable-children]>.i-amphtml-loading-container.amp-hidden{display:none!important}amp-list [fetch-error],amp-list[load-more] [load-more-button],amp-list[load-more] [load-more-end],amp-list[load-more] [load-more-failed],amp-list[load-more] [load-more-loading]{display:none}amp-list[diffable] div[role=list]{display:block}amp-story-page,amp-story[standalone]{min-height:1px!important;display:block!important;height:100%!important;margin:0!important;padding:0!important;overflow:hidden!important;width:100%!important}amp-story[standalone]{background-color:#000!important;position:relative!important}amp-story-page{background-color:#757575}amp-story .amp-active>div,amp-story .i-amphtml-loader-background{display:none!important}amp-story-page:not(:first-of-type):not([distance]):not([active]){transform:translateY(1000vh)!important}amp-autocomplete{position:relative!important;display:inline-block!important}amp-autocomplete>input,amp-autocomplete>textarea{padding:0.5rem;border:1px solid rgba(0,0,0,.33)}.i-amphtml-autocomplete-results,amp-autocomplete>input,amp-autocomplete>textarea{font-size:1rem;line-height:1.5rem}[amp-fx^=fly-in]{visibility:hidden}amp-script[nodom],amp-script[sandboxed]{position:fixed!important;top:0!important;width:1px!important;height:1px!important;overflow:hidden!important;visibility:hidden}
         /*# sourceURL=/css/ampdoc.css*/[hidden]{display:none!important}.i-amphtml-element{display:inline-block}.i-amphtml-blurry-placeholder{transition:opacity 0.3s cubic-bezier(0.0,0.0,0.2,1)!important;pointer-events:none}[layout=nodisplay]:not(.i-amphtml-element){display:none!important}.i-amphtml-layout-fixed,[layout=fixed][width][height]:not(.i-amphtml-layout-fixed){display:inline-block;position:relative}.i-amphtml-layout-responsive,[layout=responsive][width][height]:not(.i-amphtml-layout-responsive),[width][height][heights]:not([layout]):not(.i-amphtml-layout-responsive),[width][height][sizes]:not(img):not([layout]):not(.i-amphtml-layout-responsive){display:block;position:relative}.i-amphtml-layout-intrinsic,[layout=intrinsic][width][height]:not(.i-amphtml-layout-intrinsic){display:inline-block;position:relative;max-width:100%}.i-amphtml-layout-intrinsic .i-amphtml-sizer{max-width:100%}.i-amphtml-intrinsic-sizer{max-width:100%;display:block!important}.i-amphtml-layout-container,.i-amphtml-layout-fixed-height,[layout=container],[layout=fixed-height][height]:not(.i-amphtml-layout-fixed-height){display:block;position:relative}.i-amphtml-layout-fill,.i-amphtml-layout-fill.i-amphtml-notbuilt,[layout=fill]:not(.i-amphtml-layout-fill),body noscript>*{display:block;overflow:hidden!important;position:absolute;top:0;left:0;bottom:0;right:0}body noscript>*{position:absolute!important;width:100%;height:100%;z-index:2}body noscript{display:inline!important}.i-amphtml-layout-flex-item,[layout=flex-item]:not(.i-amphtml-layout-flex-item){display:block;position:relative;-ms-flex:1 1 auto;flex:1 1 auto}.i-amphtml-layout-fluid{position:relative}.i-amphtml-layout-size-defined{overflow:hidden!important}.i-amphtml-layout-awaiting-size{position:absolute!important;top:auto!important;bottom:auto!important}i-amphtml-sizer{display:block!important}@supports (aspect-ratio:1/1){i-amphtml-sizer.i-amphtml-disable-ar{display:none!important}}.i-amphtml-blurry-placeholder,.i-amphtml-fill-content{display:block;height:0;max-height:100%;max-width:100%;min-height:100%;min-width:100%;width:0;margin:auto}.i-amphtml-layout-size-defined .i-amphtml-fill-content{position:absolute;top:0;left:0;bottom:0;right:0}.i-amphtml-replaced-content,.i-amphtml-screen-reader{padding:0!important;border:none!important}.i-amphtml-screen-reader{position:fixed!important;top:0px!important;left:0px!important;width:4px!important;height:4px!important;opacity:0!important;overflow:hidden!important;margin:0!important;display:block!important;visibility:visible!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:8px!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:12px!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:16px!important}.i-amphtml-unresolved{position:relative;overflow:hidden!important}.i-amphtml-select-disabled{-webkit-user-select:none!important;-ms-user-select:none!important;user-select:none!important}.i-amphtml-notbuilt,[layout]:not(.i-amphtml-element),[width][height][heights]:not([layout]):not(.i-amphtml-element),[width][height][sizes]:not(img):not([layout]):not(.i-amphtml-element){position:relative;overflow:hidden!important;color:transparent!important}.i-amphtml-notbuilt:not(.i-amphtml-layout-container)>*,[layout]:not([layout=container]):not(.i-amphtml-element)>*,[width][height][heights]:not([layout]):not(.i-amphtml-element)>*,[width][height][sizes]:not([layout]):not(.i-amphtml-element)>*{display:none}amp-img:not(.i-amphtml-element)[i-amphtml-ssr]>img.i-amphtml-fill-content{display:block}.i-amphtml-notbuilt:not(.i-amphtml-layout-container),[layout]:not([layout=container]):not(.i-amphtml-element),[width][height][heights]:not([layout]):not(.i-amphtml-element),[width][height][sizes]:not(img):not([layout]):not(.i-amphtml-element){color:transparent!important;line-height:0!important}.i-amphtml-ghost{visibility:hidden!important}.i-amphtml-element>[placeholder],[layout]:not(.i-amphtml-element)>[placeholder],[width][height][heights]:not([layout]):not(.i-amphtml-element)>[placeholder],[width][height][sizes]:not([layout]):not(.i-amphtml-element)>[placeholder]{display:block;line-height:normal}.i-amphtml-element>[placeholder].amp-hidden,.i-amphtml-element>[placeholder].hidden{visibility:hidden}.i-amphtml-element:not(.amp-notsupported)>[fallback],.i-amphtml-layout-container>[placeholder].amp-hidden,.i-amphtml-layout-container>[placeholder].hidden{display:none}.i-amphtml-layout-size-defined>[fallback],.i-amphtml-layout-size-defined>[placeholder]{position:absolute!important;top:0!important;left:0!important;right:0!important;bottom:0!important;z-index:1}amp-img[i-amphtml-ssr]:not(.i-amphtml-element)>[placeholder]{z-index:auto}.i-amphtml-notbuilt>[placeholder]{display:block!important}.i-amphtml-hidden-by-media-query{display:none!important}.i-amphtml-element-error{background:red!important;color:#fff!important;position:relative!important}.i-amphtml-element-error:before{content:attr(error-message)}i-amp-scroll-container,i-amphtml-scroll-container{position:absolute;top:0;left:0;right:0;bottom:0;display:block}i-amp-scroll-container.amp-active,i-amphtml-scroll-container.amp-active{overflow:auto;-webkit-overflow-scrolling:touch}.i-amphtml-loading-container{display:block!important;pointer-events:none;z-index:1}.i-amphtml-notbuilt>.i-amphtml-loading-container{display:block!important}.i-amphtml-loading-container.amp-hidden{visibility:hidden}.i-amphtml-element>[overflow]{cursor:pointer;position:relative;z-index:2;visibility:hidden;display:initial;line-height:normal}.i-amphtml-layout-size-defined>[overflow]{position:absolute}.i-amphtml-element>[overflow].amp-visible{visibility:visible}template{display:none!important}.amp-border-box,.amp-border-box *,.amp-border-box :after,.amp-border-box :before{box-sizing:border-box}amp-pixel{display:none!important}amp-analytics,amp-auto-ads,amp-story-auto-ads{position:fixed!important;top:0!important;width:1px!important;height:1px!important;overflow:hidden!important;visibility:hidden}amp-story{visibility:hidden!important}html.i-amphtml-fie>amp-analytics{position:initial!important}[visible-when-invalid]:not(.visible),form [submit-error],form [submit-success],form [submitting]{display:none}amp-accordion{display:block!important}@media (min-width:1px){:where(amp-accordion>section)>:first-child{margin:0;background-color:#efefef;padding-right:20px;border:1px solid #dfdfdf}:where(amp-accordion>section)>:last-child{margin:0}}amp-accordion>section{float:none!important}amp-accordion>section>*{float:none!important;display:block!important;overflow:hidden!important;position:relative!important}amp-accordion,amp-accordion>section{margin:0}amp-accordion:not(.i-amphtml-built)>section>:last-child{display:none!important}amp-accordion:not(.i-amphtml-built)>section[expanded]>:last-child{display:block!important}
         /*# sourceURL=/css/ampshared.css*/
      </style>
      <meta content="ms_MY" property="og:locale">
      <meta content=website property=og:type>
      <meta content="'.$title.'" property=og:title>
      <meta content="'.$desc.'" property=og:description>
      <meta content=https://bc55-my.web.app property=og:url>
      <meta content='.$title.' property=og:site_name>
      <meta content=no-referrer-when-downgrade name=referrer>
      <meta content=bossclub55.com name=amp-cookie-scope>
      <meta content="10=2,11=2" name=amp-usqp>
      <meta name="description" content="'.$desc.'">
      <meta name="keywords" content="'.$key.'">
      <script id=__AMP_EXP type=text/json>{"flexible-bitrate":0.1,"amp-story-first-page-max-bitrate":0.3,"story-disable-animations-first-page":1,"story-load-first-page-only":1,"story-load-inactive-outside-viewport":1,"story-ad-page-outlink":0.02,"amp-geo-ssr":1,"story-remote-localization":1,"amp-story-subscriptions":1,"attribution-reporting":0.04}</script>
      <script
         async nomodule src=https://cdn.ampproject.org/rtv/012503242227000/v0.js></script>
      <script async crossorigin=anonymous src=https://cdn.ampproject.org/rtv/012503242227000/v0.mjs type=module></script>
      <script amp-onerror>
         [].slice.call(document.querySelectorAll("script[src*=\'/v0.js\'],script[src*=\'/v0.mjs\']")).forEach(function(s){s.onerror=function(){document.querySelector(\'style[amp-boilerplate]\').textContent=\'\'}})
      </script>
      <script async nomodule src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-viewer-integration-0.1.js></script>
      <script async crossorigin=anonymous src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-viewer-integration-0.1.mjs type=module></script>
      <script async custom-element=amp-carousel nomodule src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-carousel-0.1.js></script>
      <script async crossorigin=anonymous custom-element=amp-carousel src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-carousel-0.1.mjs type=module></script>
      <script async custom-element=amp-lightbox nomodule src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-lightbox-0.1.js></script>
      <script async crossorigin=anonymous custom-element=amp-lightbox src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-lightbox-0.1.mjs type=module></script>
      <script async custom-element=amp-sidebar nomodule src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-sidebar-0.1.js></script>
      <script async crossorigin=anonymous custom-element=amp-sidebar src=https://cdn.ampproject.org/rtv/012503242227000/v0/amp-sidebar-0.1.mjs type=module></script>
      <link href="https://bossclub55.my/storage/favicon.ico" rel="shortcut icon" type=image/x-icon>
      <link href=https://api2--tun-imgnxa-com.cdn.ampproject.org rel="dns-prefetch preconnect">
      <link href=https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org rel="dns-prefetch preconnect">
      <link href=https://ik-imagekit-io.cdn.ampproject.org rel="dns-prefetch preconnect">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <style amp-custom> :root{
         --small-font:12px;
         --normal-font:14px;
         --large-font:16px;
         --x-large-font:18px;
         --color1:{{COLOR1}}
         }
         body{
         font-size:var(--small-font);
         display:flex;
         flex-direction:column;
         padding-top:54px;
         padding-bottom:52px
         }
         a{
         text-decoration:none
         }
         summary{
         outline:none;
         list-style-type:none
         }
         summary::-webkit-details-marker{
         display:none
         }
         .container{
         align-self:center;
         margin-left:auto;
         margin-right:auto
         }
         .logo-container{
         text-align:center;
         padding:5px;
         display:flex;
         justify-content:center;
         align-items:center;
         position:fixed;
         top:0;
         left:0;
         right:0;
         z-index:99
         }
         .logo-container .logo{
         display:block;
         position:relative;
         width:180px;
         height:45px
         }
         .logo-container .logo amp-img{
         flex-grow:1
         }
         .logo-container .logo amp-img img{
         object-fit:contain
         }
         .site-menu{
         width:60%;
         background-color:#01091a
         }
         .site-menu amp-img{
         margin-right:10px
         }
         .site-menu amp-img.chevron-right{
         position:absolute;
         right:0;
         filter:invert(1);
         transition:transform .3s;
         transform-origin:center
         }
         .site-menu details[open]>summary>section>amp-img.chevron-right{
         transform:rotate(90deg)
         }
         .site-menu ul{
         list-style-type:none;
         padding:0;
         margin:0;
         font-size:var(--large-font)
         }
         .site-menu li+li,.site-menu summary,.site-menu article>ul{
         margin-top:2px
         }
         .site-menu li>a,.site-menu summary{
         display:flex;
         align-items:center;
         padding:10px 15px;
         background-color:#0d1b39;
         color:#fff;
         text-decoration:none;
         cursor:pointer
         }
         .site-menu details details summary,.site-menu details li>a{
         padding-left:45px;
         background-color:#06122c;
         cursor:pointer
         }
         .site-menu details details li>a{
         padding-left:75px;
         background-color:#040d20;
         cursor:pointer
         }
         .site-menu-hamburger{
         height:18px;
         width:18px;
         margin:0;
         position:absolute;
         right:25px;
         cursor:pointer
         }
         .site-menu-trigger [data-icon=menu]{
         display:inline-block;
         position:absolute;
         left:50%;
         top:58%;
         bottom:auto;
         right:auto;
         transform:translateX(-50%) translateY(-50%);
         width:18px;
         height:2px;
         background-color:#8e8e8e;
         transition:.5s ease-in-out
         }
         .site-menu-trigger [data-icon=menu]:before,.site-menu-trigger [data-icon=menu]:after{
         content:\'\';
         width:100%;
         height:100%;
         position:absolute;
         background-color:inherit;
         left:0
         }
         .site-menu-trigger [data-icon=menu]:before{
         bottom:5px
         }
         .site-menu-trigger [data-icon=menu]:after{
         top:5px
         }
         .link-container{
         display:flex;
         justify-content:center;
         font-size:var(--x-large-font);
         padding:0;
         width:100%
         }
         .link-container a{
         width:50%;
         text-align:center;
         padding:15px 20px;
         text-transform:uppercase
         }
         .login-button,.register-button{
         color:#fff;
         font-weight: 500;
         }
         .main-menu-container{
         list-style-type:none;
         display:flex;
         flex-wrap:wrap;
         margin:0;
         padding:10px 0;
         background-color:#02071c
         }
         .main-menu-container li{
         flex-basis:calc(25% - 10px);
         padding:5px
         }
         .main-menu-container li a{
         display:flex;
         padding:5px 0;
         justify-content:center;
         align-items:center;
         flex-direction:column;
         color:#fff;
         font-size:var(--normal-font);
         text-transform:uppercase
         }
         .main-menu-container li amp-img{
         margin:8px 0
         }
         .jackpot-container{
         display:flex;
         justify-content:center;
         position:relative
         }
         .jackpot-container .jackpot-prize{
         color:#fff
         }
         .jackpot-container .jackpot-currency{
         color:#03ffd8
         }
         .article-container{
         text-align:center
         }
         .article-container .bank-list,.article-container .social-media-list,.article-container .contact-list,.article-container .footer-links{
         display:flex;
         flex-wrap:wrap;
         margin:0 auto;
         padding:10px 0;
         list-style-type:none
         }
         .article-container .contact-list li{
         flex-basis:50%
         }
         .article-container .contact-list li a{
         margin:5px 10px;
         display:flex;
         align-items:center;
         background-color:#040a2a;
         border-radius:30px;
         color:#fff;
         font-size:var(--normal-font)
         }
         .article-container .contact-list>li a i{
         display:inline-flex;
         align-items:center;
         justify-content:center;
         -webkit-box-align:center;
         -ms-flex-align:center;
         width:36px;
         height:36px;
         margin-right:10px;
         border-radius:50%;
         background:#51c332
         }
         .article-container .contact-list>li a i amp-img{
         margin:5px;
         flex-basis:0;
         -ms-flex-preferred-size:0;
         -webkit-box-flex:1;
         -ms-flex-positive:1;
         flex-grow:1
         }
         .article-container .social-media-list{
         justify-content:center
         }
         .article-container .social-media-list li{
         flex-basis:25%
         }
         .article-container .bank-list{
         justify-content:center
         }
         .article-container .bank-list li{
         flex-basis:25%;
         position:relative;
         display:flex;
         justify-content:center;
         padding-bottom:10px;
         height:27px
         }
         .article-container .bank-list span[data-online=\'true\'],.article-container .bank-list span[data-online=\'false\']{
         width:5px;
         margin-right:5px;
         border-radius:2px
         }
         .article-container .bank-list span[data-online=\'true\']{
         background-color:#0f0
         }
         .article-container .bank-list span[data-online=\'false\']{
         background-color:#e00
         }
         .article-container .footer-links{
         background-color:#0a1749;
         flex-wrap:wrap;
         justify-content:center
         }
         .article-container .footer-links li{
         flex-basis:calc(25% - 3px);
         margin-bottom:5px
         }
         .article-container .footer-links>li:not(:nth-child(5n+5)):not(:first-child){
         border-left:1px solid #fff
         }
         .article-container .footer-links li a{
         padding:5px;
         color:#fff;
         font-size:var(--normal-font)
         }
         .article-detail{
         background-color:#050c29;
         padding:10px;
         text-align:left
         }
         .article-container h1,.article-container h2,.article-container h3,.article-container h4{
         display:inline
         }
         .copyright{
         padding:25px 0 20px;
         display:flex;
         flex-direction:column;
         justify-content:center
         }
         .copyright div{
         padding-bottom:10px
         }
         .fixed-footer{
         display:flex;
         justify-content:space-around;
         position:fixed;
         background-color:#0a1749;
         padding:5px 0;
         left:0;
         right:0;
         bottom:0;
         z-index:99
         }
         .fixed-footer a{
         flex-basis:calc((100% - 15px*6)/5);
         display:flex;
         flex-direction:column;
         justify-content:center;
         align-items:center;
         color:#999
         }
         .fixed-footer a.active{
         color:#0195ff
         }
         @media(min-width:768px){
         body{
         font-size:var(--normal-font);
         padding-top:80px
         }
         .container{
         min-width:768px;
         max-width:970px
         }
         .site-menu{
         width:20%
         }
         .logo-container .logo{
         width:320px;
         height:70px
         }
         }
         @media(min-width:1200px){
         .container{
         width:1170px
         }
         }
         @media(min-width:992px){
         .container{
         width:970px
         }
         }
         @font-face {
         font-family: \'Roboto\';
         src: url(\'https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxP.woff2\') format(\'woff2\'),
         url(\'https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxP.woff\') format(\'woff\');
         font-weight: normal;
         font-style: normal;
         }
         body {
         font-family: \'Roboto\', sans-serif;
         background-color: #000418;
         color: white;
         }
         .jackpot-prize{
         position:absolute;
         font-size:20px;
         bottom:20%
         }
         .jackpot-container{
         height:175px
         }
         .modal-dialog{
         background:rgba(0,0,0,.5);
         width:100%;
         height:100%;
         position:absolute;
         display:flex;
         align-items:center;
         justify-content:center
         }
         .modal-content{
         background:#0c0c0c;
         border-color:#0c0c0c;
         color:#bbb;
         flex-basis:95%;
         pointer-events:initial;
         border:0;
         border-radius:10px;
         border:5px solid #000
         }
         .modal-header{
         background:#0c0c0c;
         border-bottom-color:#333;
         text-align:center;
         border-top-left-radius:inherit;
         border-top-right-radius:inherit;
         border-bottom:0;
         min-height:50px;
         text-transform:uppercase;
         display:contents
         }
         .modal-content h4{
         color:#1b4bff
         }
         .modal-header .close{
         opacity:1;
         margin:0;
         color:#fff;
         float:right;
         font-size:21px;
         font-weight:bold;
         line-height:1;
         text-shadow:0 1px 0 #fff;
         background-color:transparent;
         border:none
         }
         .modal-body{
         position:relative;
         padding:20px
         }
         .fixed-footer{
         background-color:#1e274b
         }
         .fixed-footer a{
         background-color:inherit;
         flex-basis:calc((100% - 15px*6)/5);
         max-width:75px;
         color:#fff;
         font-size:var(--small-font)
         }
         .fixed-footer a.active{
         color:#ff00b2
         }
         .fixed-footer .center{
         transform:scale(1);
         background:center no-repeat;
         background-size:contain;
         background-color:inherit;
         border-radius:50%
         }
         .fixed-footer amp-img{
         max-width:40%;
         margin-bottom:5px
         }
         .fixed-footer .live-chat-icon{
         animation:pulse 3s infinite
         }
         .download-apk-container{
         background:var(--image-src);
         background-size:cover;
         display:flex;
         color:#000;
         align-items:center;
         font-family:sans-serif
         }
         .download-apk-container .modal{
         font-family:\'digital_sans_ef_medium\'
         }
         .download-apk-container .popup-modal[data-title] .modal-title:before{
         content:none
         }
         .download-apk-container .popup-modal .modal-header h4{
         font-size:24px
         }
         .download-apk-container .popup-modal .modal-body{
         padding-top:0
         }
         .download-apk-container .popup-modal .modal-body img{
         height:20px;
         width:20px
         }
         .download-apk-container .popup-modal .modal-body h5{
         font-size:18px;
         color:inherit;
         text-transform:uppercase;
         margin-block-start:0;
         margin-block-end:0
         }
         .download-apk-container .popup-modal .modal-body ol{
         list-style:decimal;
         padding-left:5px;
         line-height:20px
         }
         .download-apk-container h2,.download-apk-container h3{
         margin:0
         }
         .download-apk-container h2{
         font-weight:600;
         font-size:var(--x-large-font);
         text-transform:uppercase
         }
         .download-apk-container h3{
         font-size:var(--small-font);
         font-weight:100
         }
         .download-apk-container a{
         font-size:var(--small-font);
         text-transform:uppercase
         }
         .download-apk-container>div{
         flex-basis:50%;
         text-align:center
         }
         .download-apk-container>div:first-child{
         align-self:flex-end
         }
         .download-apk-info{
         display:flex;
         justify-content:center;
         padding:7px 0
         }
         .download-apk-info>div{
         flex-basis:45%;
         max-width:45%
         }
         .download-apk-section{
         text-align:center;
         margin-right:5px
         }
         .download-apk-section a{
         color:#fff;
         text-transform:uppercase;
         padding:2px 0;
         display:block;
         border-radius:20px;
         text-align:center;
         background:#f69c00;
         background:linear-gradient(to bottom,#f69c00 0%,#d17601 100%)
         }
         .download-apk-guide{
         text-decoration:underline;
         color:#fff;
         background-color:transparent;
         border:none;
         text-transform:uppercase;
         font-size:var(--small-font)
         }
         @media(max-width:575.98px){
         .download-apk-section amp-img{
         width:50px
         }
         }
         body{
         background-color:#F78E21
         }
         .logo-container{
         background:#000000
         }
         .site-menu{
         background-color:#dfdddd
         }
         .site-menu amp-img.chevron-right{
         filter:none
         }
         .site-menu li>a,.site-menu summary{
         background-color:#dfdddd;
         color:#000;
         border-bottom:2px solid #333
         }
         .site-menu details details summary,.site-menu details li>a{
         background-color:#f5f0f0
         }
         .site-menu details details li>a{
         background-color:#f5f0f0
         }
         .site-menu-trigger [data-icon=menu]{
         background-color:#f5f0f0
         }
         .login-button,.register-button{
         color:#fff
         }
         .register-button{
         background:#0267ff;
         background:linear-gradient(to bottom,#0267ff 0%,#033784 100%)
         }
         .register-button:hover{
         background:#0030ce;
         background:linear-gradient(to bottom,#ce7400 0%,#fca501 100%)
         }
         .login-button{
         background:#696969;
         background:linear-gradient(to bottom,#696969 0%,#383838 100%)
         }
         .login-button:hover{
         background:#383838;
         background:linear-gradient(to bottom,#383838 0%,#696969 100%)
         }
         .main-menu-container{
         background-color:#f5f0f0
         }
         .main-menu-container li a{
         color:#111
         }
         .jackpot-container .jackpot-prize{
         color:#fff
         }
         .jackpot-container .jackpot-currency{
         color:#fff
         }
         .article-container{
         color:#737373
         }
         .article-container .contact-list li a{
         background-color:#e7e7e7;
         color:#e52517
         }
         .article-container .contact-list>li a i{
         background:#e52517
         }
         .article-container .bank-list span[data-online=\'true\']{
         background-color:#0f0
         }
         .article-container .bank-list span[data-online=\'false\']{
         background-color:#e00
         }
         .article-container .footer-links{
         background-color:#f5f0f0
         }
         .article-container .footer-links>li:not(:nth-child(5n+5)):not(:first-child){
         border-color:#ccc
         }
         .article-container .footer-links li a{
         color:#111
         }
         .article-detail{
         background-color:#f5f0f0;
         color:#737373
         }
         .copyright{
         background-color:#080808
         }
         .fixed-footer{
         background-color:#000000
         }
         .fixed-footer a{
         color: #F78E21
         }
         .fixed-footer a.active{
         color:#F78E21
         }
         .modal-header .close{
         color:#b9b9b9;
         text-shadow:0 1px 0 #b9b9b9;
         background-color:transparent
         }
         .modal-content{
         background:#fff;
         border-color:#fff;
         color:#848484;
         border:5px solid #fff
         }
         .modal-content h4{
         color:#7f2c2c
         }
         .download-apk-section a{
         color:#fff;
         background:#faa302;
         background:linear-gradient(to bottom,#faa302 0%,#cf7300 100%)
         }
         .download-apk-container .popup-modal .modal-body img{
         filter:contrast(0)
         }
         @media(min-width:768px){
         .copyright{
         background-color:transparent
         }
         }
         .tombol-container{
         display:flex;
         justify-content:center;
         font-size:var(--x-large-font);
         padding:0;
         width:100%
         }
         .tombol-container a{
         width:100%;
         text-align:center;
         padding:15px 20px;
         text-transform:uppercase
         }
         .new-login-button,.new-register-button{
         color:#fff
         }
         .new-login-button{
         background:#696969;
         background:linear-gradient(to bottom, #1bf910 0%, #383838 100%)
         }
         .new-register-button{
         background:#696969;
         background:linear-gradient(to bottom, #2579c5 0%, #383838 100%)
         }
      </style>
      <title>'.$title.'</title>
      <link href=https://bc55-my.web.app itemprop=mainEntityOfPage rel=canonical>
      <style amp-boilerplate>
         body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
      </style>
      <noscript>
         <style amp-boilerplate>
            body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
         </style>
      </noscript>
      <meta content=2 name=runtime-type>
   </head>
   <body>
      <amp-sidebar class="site-menu i-amphtml-layout-nodisplay" hidden=hidden i-amphtml-layout=nodisplay id=site-menu layout=nodisplay side=right>
         <ul>
            <li>
               <a href=https://bc55-my.web.app target=_top>
                  <amp-img alt=Home class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/home.svg?v=20231212-1"
                     srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/home.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/home.svg?v=20231212-1 56w"
                     style=width:18px;height:18px; width=18></amp-img>
                  Home
               </a>
            </li>
            <li>
               <details>
                  <summary>
                     <section>
                        <span>
                           <amp-img alt=Games class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/hot-games.svg?v=20231212-1" srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/hot-games.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/hot-games.svg?v=20231212-1 56w" style=width:18px;height:18px; width=18></amp-img>
                           Games
                        </span>
                        <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                           srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                           style=width:18px;height:18px; width=18></amp-img>
                     </section>
                  </summary>
                  <article>
                     <ul>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Hot Games
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Pragmatic Play
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Nex4D
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       MicroGaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Habanero
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       AdvantPlay
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       PG Slots
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Reel Kingdom by Pragmatic
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       ION Casino
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Playstar
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Slots
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Pragmatic Play
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       MicroGaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       PG Slots
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Reel Kingdom by Pragmatic
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       AdvantPlay
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       No Limit City
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Habanero
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Joker
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Jili
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Spade Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Live22
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Playstar
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Spinix
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Crowd Play
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Bigpot
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       VPower
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Worldmatch
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Fachai
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Slot88
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       ION Slot
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       AMB Slot
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Mario Club
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Dragoonsoft
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Fun Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Naga Games
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       JDB
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       CQ9
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Top Trend Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Netent
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Big Time Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Red Tiger
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Skywind
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Playtech
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Yggdrasil
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Play&#39;n Go
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Real Time Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Funky Games
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Live Casino
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       ION Casino
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       PP Casino
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       MG Live
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Evo Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Sexy Baccarat
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Pretty Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Asia Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       AllBet
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       PGS Live
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       SA Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Ebet
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Dream Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       568Win Casino
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       HKB
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       SV388
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Lottery
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Nex4D
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Sport
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       SBO Sportsbook
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Saba Sportsbook
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       Opus
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       WBet
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_blank>
                                       IM Sportsbook
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Pinnacle
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       CMD
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       SBO Virtual Sports
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       PP Virtual Sports
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Crash Game
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       PP Casino
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Spribe
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       MicroGaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Spinix
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       AdvantPlay Mini Game
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Joker
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Dragoonsoft
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Funky Games
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Arcade
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       MicroGaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Spinix
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Spribe
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Joker
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Fachai
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Jili
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       AMB Slot
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Crowd Play
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       VPower
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Worldmatch
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Mario Club
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Dragoonsoft
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Live22
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       CQ9
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Spade Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Fun Gaming
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Arcadia
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       MM Tangkas
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Skywind
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Playstar
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       AdvantPlay Mini Game
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       JDB
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Funky Games
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    Poker
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Balak Play
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       9Gaming
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                        <li>
                           <details>
                              <summary>
                                 <section>
                                    E-Sports
                                    <amp-img class="chevron-right i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1"
                                       srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/icons/chevron-right.svg?v=20231212-1 56w"
                                       style=width:18px;height:18px; width=18></amp-img>
                                 </section>
                              </summary>
                              <article>
                                 <ul>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       IM Esports
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       Pinnacle E-Sports
                                       </a>
                                    </li>
                                    <li>
                                       <a href=https://bc55-my.web.app target=_top>
                                       TF Gaming
                                       </a>
                                    </li>
                                 </ul>
                              </article>
                           </details>
                        </li>
                     </ul>
                  </article>
               </details>
            </li>
            <li>
               <a href=https://bc55-my.web.app target=_top>
                  <amp-img alt=Login class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=18 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/login.svg?v=20231212-1"
                     srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/login.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w56/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/menu/login.svg?v=20231212-1 56w"
                     style=width:18px;height:18px; width=18></amp-img>
                  Login
               </a>
            </li>
         </ul>
      </amp-sidebar>
      <div class=logo-container>
         <a class=logo href=https://bc55-my.web.app target=_top>
            <amp-img alt class="i-amphtml-layout-fill i-amphtml-layout-size-defined" i-amphtml-layout=fill layout=fill noloading src="https://bossclub55.my/storage/logo/bossclub55-logo.webp"></amp-img>
         </a>
         <a class=site-menu-hamburger on=tap:site-menu>
         <label class=site-menu-trigger>
         <i data-icon=menu></i>
         </label>
         </a>
      </div>
      <amp-carousel autoplay class="carousel-container i-amphtml-layout-responsive i-amphtml-layout-size-defined" delay=5000 height=720 i-amphtml-layout=responsive layout=responsive loop type=slides width=1920>
         <i-amphtml-sizer slot=i-amphtml-svc style=display:block;padding-top:35%;></i-amphtml-sizer>
         <a href=https://bc55-my.web.app target=_top>
            <amp-img alt=slot class="i-amphtml-layout-responsive i-amphtml-layout-size-defined" height=720 i-amphtml-layout=responsive layout=responsive src=https://bossclub55.my/storage/sliders/slider1.webp title=bossclub55
               width=1920>
               <i-amphtml-sizer slot=i-amphtml-svc style=display:block;padding-top:35%;></i-amphtml-sizer>
               <img class=i-amphtml-blurry-placeholder placeholder src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns=&#39;http%3A//www.w3.org/2000/svg&#39; xmlns%3Axlink=&#39;http%3A//www.w3.org/1999/xlink&#39; viewBox=&#39;0 0 13 4&#39;%3E%3Cfilter id=&#39;b&#39; color-interpolation-filters=&#39;sRGB&#39;%3E%3CfeGaussianBlur stdDeviation=&#39;.5&#39;%3E%3C/feGaussianBlur%3E%3CfeComponentTransfer%3E%3CfeFuncA type=&#39;discrete&#39; tableValues=&#39;1 1&#39;%3E%3C/feFuncA%3E%3C/feComponentTransfer%3E%3C/filter%3E%3Cimage filter=&#39;url(%23b)&#39; x=&#39;0&#39; y=&#39;0&#39; height=&#39;100%25&#39; width=&#39;100%25&#39; xlink%3Ahref=&#39;data%3Aimage/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wAARCAAEAA0DASIAAhEBAxEB/8QAFgABAQEAAAAAAAAAAAAAAAAAAAMF/8QAHxAAAgICAQUAAAAAAAAAAAAAAQIAAxEhBAUyUXGx/8QAFQEBAQAAAAAAAAAAAAAAAAAAAwX/xAAXEQADAQAAAAAAAAAAAAAAAAAAAQMC/9oADAMBAAIRAxEAPwC3U1RLaqlQYCd2Tk69zB52rAVyo8BifpiIVitFt7P/2Q==&#39;%3E%3C/image%3E%3C/svg%3E">
            </amp-img>
         </a>
         <a href=https://bc55-my.web.app target=_top>
            <amp-img alt=slot class="i-amphtml-layout-responsive i-amphtml-layout-size-defined" height=720 i-amphtml-layout=responsive layout=responsive src=https://bossclub55.my/storage/sliders/slider2.webp title=bossclub55
               width=1920>
               <i-amphtml-sizer slot=i-amphtml-svc style=display:block;padding-top:35%;></i-amphtml-sizer>
               <img class=i-amphtml-blurry-placeholder placeholder src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns=&#39;http%3A//www.w3.org/2000/svg&#39; xmlns%3Axlink=&#39;http%3A//www.w3.org/1999/xlink&#39; viewBox=&#39;0 0 13 4&#39;%3E%3Cfilter id=&#39;b&#39; color-interpolation-filters=&#39;sRGB&#39;%3E%3CfeGaussianBlur stdDeviation=&#39;.5&#39;%3E%3C/feGaussianBlur%3E%3CfeComponentTransfer%3E%3CfeFuncA type=&#39;discrete&#39; tableValues=&#39;1 1&#39;%3E%3C/feFuncA%3E%3C/feComponentTransfer%3E%3C/filter%3E%3Cimage filter=&#39;url(%23b)&#39; x=&#39;0&#39; y=&#39;0&#39; height=&#39;100%25&#39; width=&#39;100%25&#39; xlink%3Ahref=&#39;data%3Aimage/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wAARCAAEAA0DASIAAhEBAxEB/8QAFgABAQEAAAAAAAAAAAAAAAAAAAMF/8QAHxAAAgICAQUAAAAAAAAAAAAAAQIAAxEhBAUyUXGx/8QAFQEBAQAAAAAAAAAAAAAAAAAAAwX/xAAXEQADAQAAAAAAAAAAAAAAAAAAAQMC/9oADAMBAAIRAxEAPwC3U1RLaqlQYCd2Tk69zB52rAVyo8BifpiIVitFt7P/2Q==&#39;%3E%3C/image%3E%3C/svg%3E">
            </amp-img>
         </a>
      </amp-carousel>
      <div class="link-container container">
         <a class=register-button href=https://bc55-my.web.app target=_blank>REGISTER</a>
         <a class=login-button href=https://bc55-my.web.app target=_blank>LOGIN</a>
      </div>
      <ul class="main-menu-container container">
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt="Hot Games" class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/hot-games.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/hot-games.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/hot-games.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/hot-games.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Hot Games
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt=Slots class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/slots.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/slots.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/slots.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/slots.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Slots
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt="Live Casino" class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/casino.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/casino.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/casino.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/casino.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Live Casino
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt=Lottery class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/others.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/others.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/others.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/others.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Lottery
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt=Sport class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/sports.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/sports.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/sports.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/sports.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Sport
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt="Crash Game" class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/crash-game.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/crash-game.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/crash-game.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/crash-game.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Crash Game
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt=Arcade class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/arcade.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/arcade.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/arcade.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/arcade.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Arcade
            </a>
         </li>
         <li>
            <a href=https://bc55-my.web.app target=_blank style="font-size:10px;">
               <amp-img alt=Poker class="i-amphtml-layout-fixed i-amphtml-layout-size-defined" height=30 i-amphtml-layout=fixed layout=fixed src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/poker.svg?v=20231212-1"
                  srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w39/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/poker.svg?v=20231212-1 39w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w68/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/poker.svg?v=20231212-1 68w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w100/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/menu/poker.svg?v=20231212-1 100w"
                  style=width:30px;height:30px; width=30></amp-img>
               Poker
            </a>
         </li>
      </ul>
      <div class="carousel-container" style="height: 500;">
         <div style="background-color: #000;height:500;">
            <amp-img alt="bossclub55" class="i-amphtml-layout-responsive i-amphtml-layout-size-defined" height=500 i-amphtml-layout=responsive layout=responsive src="https://bossclub55.my/storage/logo/bossclub55-logo.webp">
               <i-amphtml-sizer slot=i-amphtml-svc style=display:block;padding-top:75.9627%;background-color:#000;></i-amphtml-sizer>
               <img class=i-amphtml-blurry-placeholder placeholder src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns=&#39;http%3A//www.w3.org/2000/svg&#39; xmlns%3Axlink=&#39;http%3A//www.w3.org/1999/xlink&#39; viewBox=&#39;0 0 8 6&#39;%3E%3Cfilter id=&#39;b&#39; color-interpolation-filters=&#39;sRGB&#39;%3E%3CfeGaussianBlur stdDeviation=&#39;.5&#39;%3E%3C/feGaussianBlur%3E%3CfeComponentTransfer%3E%3CfeFuncA type=&#39;discrete&#39; tableValues=&#39;1 1&#39;%3E%3C/feFuncA%3E%3C/feComponentTransfer%3E%3C/filter%3E%3Cimage filter=&#39;url(%23b)&#39; x=&#39;0&#39; y=&#39;0&#39; height=&#39;100%25&#39; width=&#39;100%25&#39; xlink%3Ahref=&#39;data%3Aimage/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAGCAYAAAD+Bd/7AAAAw0lEQVQImWNwL/Bh8CjwYXTP9JZyinZ29Ih3NQWJeRX4soFoBo98XxY/a/NNIeLi/0NkZP8XWJt9j030CZ5eW3YIrCAvOyYiOThsxWQL+//lri7/y9wd/udGhJwILAyUBCsIKQsX7Z3Y05HrZvCrOkDov4OZ+n8lJaX/lkF2EWAFTR0NuafXHf3f1zX5uQzQCjFRsf8SEhL/5RXln7lle/EzeOf783dN7iyIrolX0DExuyfPxfVfR5Dnvw4vx39DM+0pAJG9RuHTpI8cAAAAAElFTkSuQmCC&#39;%3E%3C/image%3E%3C/svg%3E">
            </amp-img>
         </div>
      </div>
      <div class="article-container container">
         <div class=article-detail>
          '.$article.'
         </div>
      </div>
      <div class=fixed-footer style="border-top: #F78E21 solid;border-radius:20px;border-width: 5px;">
         <a class=active href=https://bc55-my.web.app target=_blank>
            <amp-img alt=Home height=75 layout=intrinsic src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/home-active.svg?v=20231212-1" srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w82/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/home-active.svg?v=20231212-1 82w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w150/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/home-active.svg?v=20231212-1 150w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w270/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/home-active.svg?v=20231212-1 270w"
               width=75></amp-img>
            Home
         </a>
         <a href=https://bc55-my.web.app target=_blank>
            <amp-img alt=Login class=center height=75 layout=intrinsic src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/login.svg?v=20231212-1" srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w82/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/login.svg?v=20231212-1 82w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w150/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/login.svg?v=20231212-1 150w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w270/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/login.svg?v=20231212-1 270w"
               width=75></amp-img>
            Login
         </a>
         <a href=https://bc55-my.web.app target=_blank>
            <amp-img alt=Promosi height=75 layout=intrinsic src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/promotion.svg?v=20231212-1" srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w82/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/promotion.svg?v=20231212-1 82w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w150/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/promotion.svg?v=20231212-1 150w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w270/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/promotion.svg?v=20231212-1 270w"
               width=75></amp-img>
            Promotion
         </a>
         <a class="js_live_chat_link live-chat-link" href=https://secure.livechatenterprise.com/licence/14712762/v2/open_chat.cgi target=_blank>
            <amp-img alt="Live Chat" class=live-chat-icon height=75 layout=intrinsic src="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/AW/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/live-chat.svg?v=20231212-1"
               srcset="https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w82/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/live-chat.svg?v=20231212-1 82w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w150/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/live-chat.svg?v=20231212-1 150w, https://d1bnhxh1olb98c-cloudfront-net.cdn.ampproject.org/ii/w270/s/d1bnhxh1olb98c.cloudfront.net/Images/nexus-alpha/red-white/mobile/layout/footer/live-chat.svg?v=20231212-1 270w"
               width=75></amp-img>
            Live Chat
         </a>
      </div>
   </body>
</html>';
?>
