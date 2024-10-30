/*
 * Cookielay
 * Version 1.0 (16.11.2020)
 * 
 * Made by Jonas Marlo Lörken
 * https://www.iamjonas.de
 * 
 */

(function($) {

    /* Variables */

    var cookielay = $('#cookielay'),
        cookielay_layout_bottom = $('#cookielay.cl-layout-bottom'),
        cookielay_layout_center = $('#cookielay.cl-layout-center'),
        cookielay_inner_content = $('.cookielay__content'),
        cookielay_inner_settings = $('.cookielay__settings'),
        cookielay_button_more = $('[data-cookielay-more]'),
        cookielay_button_settings = $('[data-cookielay-settings]'),
        cookielay_button_safe = $('[data-cookielay-allow]'),
        cookielay_checkbox = $('.cl-checkbox')
        cookielay_close = $('.cl-close'),
        cookielay_accordion = $('.cl-accordion'),
        cookielay_accordion_content = $('.cl-accordion__content'),
        cookielay_branding = $('.cl-branding'),
        cookielay_switch_group = $('[data-cookielay-group]'),
        cookielay_switch_cookie = $('[data-cookielay-cookie]'),
        cookielay_class_moved = 'cl-moved',
        cookielay_class_visible = 'cl-visible',
        cookielay_button_action = $('[data-cookielay-action]');
    
    var cookielay_settings_posts_exceptions = cookielay_settings["posts-exceptions"],
        cookielay_settings_posttypes_exceptions = cookielay_settings["posttypes-exceptions"],
        cookielay_settings_post_id = cookielay_settings["post-id"],
        cookielay_settings_post_type = cookielay_settings["post-type"],
        cookielay_settings_deactivate_bots = cookielay_settings["deactivate-bots"],
        cookielay_settings_reload = cookielay_settings["reload"],
        cookielay_settings_domain = cookielay_generate_domain(cookielay_settings["domain"]),
        cookielay_settings_path = cookielay_generate_path(cookielay_settings["domain"]),
        cookielay_settings_essential_group = cookielay_settings["essential-group"],
        cookielay_settings_cookiename = cookielay_settings["cookiename"],
        cookielay_settings_cookietime = cookielay_settings["cookietime"],
        cookielay_settings_enable_scroll = cookielay_settings["enable-scroll"],
        cookielay_settings_delay = cookielay_generate_delay(cookielay_settings["delay"]),
        cookielay_settings_token = cookielay_settings["token"];

    var cookielay_cookies_cookies = cookielay_cookies,
        cookielay_cookies_groups = cookielay_groups;

    /* Generate Variables */

    function cookielay_generate_delay(delay) {
        delay = delay * 1000;
        return delay;
    }

    function cookielay_generate_domain(domain) {
        domain = domain.split("/");
        return domain[2];
    }

    function cookielay_generate_path(domain) {
        domain = domain.split("/");
        domain.splice(0, 3);
        domain = domain.join("/");
        return "/" + domain;
    }

    /* Check Variables */

    function cookielay_check_variables() {
        var status = true;
        if(typeof cookielay_settings_posts_exceptions == 'undefined' || cookielay_settings_posts_exceptions == null) {
            console.error("Error: Post-ID Exceptions is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_posttypes_exceptions == 'undefined' || cookielay_settings_posttypes_exceptions == null) {
            console.error("Error: Post-Type Exceptions is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_post_id == 'undefined' || cookielay_settings_post_id == null) {
            console.error("Error: Post-ID is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_post_type == 'undefined' || cookielay_settings_post_type == null) {
            console.error("Error: Post-Type is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_deactivate_bots == 'undefined' || cookielay_settings_deactivate_bots == null) {
            console.error("Error: Bot deactivation is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_reload == 'undefined' || cookielay_settings_reload == null) {
            console.error("Error: Reload is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_domain == 'undefined' || cookielay_settings_domain == null) {
            console.error("Error: Domain is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_path == 'undefined' || cookielay_settings_path == null) {
            console.error("Error: Path is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_essential_group == 'undefined' || cookielay_settings_essential_group == null) {
            console.error("Error: Essential Group is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_cookiename == 'undefined' || cookielay_settings_cookiename == null) {
            console.error("Error: Cookiename is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_cookietime == 'undefined' || cookielay_settings_cookietime == null) {
            console.error("Error: Cookietime is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_enable_scroll == 'undefined' || cookielay_settings_enable_scroll == null) {
            console.error("Error: Enable Scroll is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_delay == 'undefined' || cookielay_settings_delay == null) {
            console.error("Error: Delay is undefined or null!");
            status = false;
        }
        if(typeof cookielay_settings_token == 'undefined' || cookielay_settings_token == null) {
            console.error("Error: Token is undefined or null!");
            status = false;
        }
        if(typeof cookielay_cookies_cookies == 'undefined' || cookielay_cookies_cookies == null) {
            console.error("Error: Cookies are undefined or null!");
            status = false;
        }
        if(typeof cookielay_cookies_groups == 'undefined' || cookielay_cookies_groups == null) {
            console.error("Error: Groups are undefined or null!");
            status = false;
        }
        return status;
    }

    /* Frontend Functions */

    cookielay_button_more.click(function() {
        var content = $(this).parent().next(cookielay_accordion_content);
        content.slideToggle(500);
    });

    cookielay_layout_bottom.find(cookielay_button_settings).click(function() {
        var settings = cookielay_layout_bottom.find(cookielay_inner_settings);
        settings.slideToggle(500);
    });

    cookielay_layout_center.find(cookielay_button_settings).click(function() {
        cookielay.toggleClass(cookielay_class_moved);
        cookielay.find(cookielay_inner_settings).toggleClass(cookielay_class_visible);
    });

    cookielay.find(cookielay_inner_settings).find(cookielay_close).click(function() {
        cookielay.removeClass(cookielay_class_moved);
        cookielay.find(cookielay_inner_settings).removeClass(cookielay_class_visible);
    });

    /* Cookielay Actions */

    cookielay_button_action.click(function(e) {
        var action = $(this).data("cookielay-action");
        e.preventDefault();
        switch(action) {
            case "open":
                cookielay_show();
                break;
            case "reset-settings":
                cookielay_delete_cookie();
                break;
            case "remove-cookie":
                var id = $(this).data("cookielay-cookie");
                cookielay_remove_cookie(id);
                break;
        }
    });

    /* Select Functions */

    cookielay_checkbox.find(cookielay_switch_group).change(function() {
        var group = $(this).data("cookielay-group");
        if($(this).prop("checked")) {
            cookielay_accordion.find("[data-cookielay-group="+group+"]").prop("checked", true).change();
        } else {
            cookielay_accordion.find("[data-cookielay-group="+group+"]").prop("checked", false).change();
        }
    });

    cookielay_accordion.find(cookielay_switch_group).change(function() {
        var group = $(this).data("cookielay-group");
        if($(this).prop("checked")) {
            cookielay_checkbox.find("[data-cookielay-group="+group+"]").prop("checked", true);
            $(this).closest(cookielay_accordion).find(cookielay_switch_cookie).prop("checked", true);
        } else {
            cookielay_checkbox.find("[data-cookielay-group="+group+"]").prop("checked", false);
            $(this).closest(cookielay_accordion).find(cookielay_switch_cookie).prop("checked", false);
        }
    });

    cookielay_accordion.find(cookielay_switch_cookie).change(function() {
        var group = $(this).closest(cookielay_accordion).find(cookielay_switch_group).data("cookielay-group");
        if($(this).prop("checked")) {
            cookielay_checkbox.find("[data-cookielay-group="+group+"]").prop("checked", true);
            $(this).closest(cookielay_accordion).find(cookielay_switch_group).prop("checked", true);
        } else {
            var status = true;
            $(this).closest(cookielay_accordion).find(cookielay_switch_cookie).each(function() {
                if($(this).prop("checked")) {
                    status = false;
                }
            });
            if(status) {
                cookielay_checkbox.find("[data-cookielay-group="+group+"]").prop("checked", false);
                $(this).closest(cookielay_accordion).find(cookielay_switch_group).prop("checked", false);
            }
        }
    });

    /* Cookie Functions */

    function cookielay_set_cookie(value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (cookielay_settings_cookietime * 24 * 60 * 60 * 1000));
        document.cookie = cookielay_settings_cookiename + '=' + JSON.stringify(value) + ';expires=' + expires.toUTCString() + ';domain=' + cookielay_settings_domain + ';path=/';
    }

    function cookielay_get_cookie() {
        var keyValue = document.cookie.match('(^|;) ?' + cookielay_settings_cookiename + '=([^;]*)(;|$)');
        return keyValue ? JSON.parse(keyValue[2]) : null;
    }

    function cookielay_delete_cookie() {
        document.cookie = cookielay_settings_cookiename + '=null;expires=Thu, 01 Jan 1970 00:00:00 GMT;domain=' + cookielay_settings_domain;
    }

    function cookielay_check_cookie() {
        var status = false;
        if(cookielay_get_cookie(cookielay_settings_cookiename)) {
            status = true;
        }
        return status;
    }

    /* Remove Cookie */

    function cookielay_remove_cookie(id) {
        var cookie_value = cookielay_get_cookie();
        cookie_value["cookies"].forEach((cookie, index) => {
            if(cookie["id"] == id) {
                cookie_value["cookies"].splice(index, 1);
            }
        });
        cookielay_set_cookie(cookie_value);
    }

    /* Generate Cookies */

    function cookielay_allow_all() {
        var cookies = [];
        cookielay_cookies_cookies.forEach(cookie => cookies.push({id: cookie["id"]}));
        return cookies;
    }

    function cookielay_allow_custom() {
        var cookies = [];
        cookielay.find(cookielay_switch_cookie).each(function() {
            if($(this).prop("checked")) {
                var id = $(this).data("cookielay-cookie");
                cookies.push({id: id});
            }
        });
        cookielay_cookies_cookies.forEach(cookie => {
            if(cookielay_settings_essential_group == cookie["cookie_group"]) {
                cookies.push({id: cookie["id"]});
            }
        });
        return cookies;
    }

    function cookielay_allow_essential() {
        var cookies = [];
        cookielay_cookies_cookies.forEach(cookie => {
            if(cookielay_settings_essential_group == cookie["cookie_group"]) {
                cookies.push({id: cookie["id"]});
            }
        });
        return cookies;
    }

    /* Generate Value */

    function cookielay_generate_value(type) {
        var cookies = [];
        switch(type) {
            case "all":
                cookies = cookielay_allow_all();
                break;
            case "custom":
                cookies = cookielay_allow_custom();
                break;
            case "essential":
                cookies = cookielay_allow_essential();
                break;
            default:
                cookies = cookielay_allow_essential();
        }
        var value = {token: cookielay_settings_token, cookies: cookies};
        return value;
    }

    /* Visbility Functions */

    function cookielay_show() {
        cookielay_disable_scroll();
        cookielay.fadeIn(500);
    }

    function cookielay_hide() {
        cookielay_enable_scroll();
        cookielay.fadeOut(500);
    }

    /* Safe Cookielay */

    cookielay_button_safe.click(function() {
        var type = $(this).data("cookielay-allow"),
            value = cookielay_generate_value(type);
        cookielay_set_cookie(value);
        cookielay_hide();
        cookielay_run_functions();
        cookielay_reload_page();
    });

    /* Block for Bots/Crawler */

    function cookielay_check_bots() {
        var status = false;
        if(cookielay_settings_deactivate_bots) {
            var botPattern = "(googlebot\/|bot|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)";
            var re = new RegExp(botPattern, 'i');
            var userAgent = navigator.userAgent; 
            if (re.test(userAgent)) {
                status = true;
            }
        }
        return status;
    }

    /* Reload Function */

    function cookielay_reload_page() {
        if(cookielay_settings_reload) {
            setTimeout(function() {
                location.reload();
            }, 500);
        }
    }

    /* Scroll Functions */

    function cookielay_disable_scroll() {
        if(!cookielay_settings_enable_scroll) {
            $("body").addClass("cl-disabled-scroll");
        }
    }

    function cookielay_enable_scroll() {
        if(!cookielay_settings_enable_scroll) {
            $("body").removeClass("cl-disabled-scroll");
        }
    }

    /* Check token */

    function cookielay_check_token() {
        var status = false,
            cookie = cookielay_get_cookie();
        if(cookie["token"] == cookielay_settings_token) {
            status = true;
        }
        return status;
    }

    /* Check exceptions */

    function cookielay_check_exceptions() {
        var status = false;
        if(cookielay_settings_posts_exceptions.includes(cookielay_settings_post_id.toString()) || cookielay_settings_posttypes_exceptions.includes(cookielay_settings_post_type)) {
            status = true;
        }
        return status;
    }

    /* Run functions */

    function cookielay_run_functions() {
        var cookielay_cookie = cookielay_get_cookie(),
            head_scripts = [],
            body_scripts = [];
        cookielay_cookies_cookies.forEach(cookie => {
            if(cookielay_cookie["cookies"].find(single => single.id == cookie["id"])) {
                if(cookie["execute_header"] == true) {
                    head_scripts.push(cookie["allow_script"]);
                } else {
                    body_scripts.push(cookie["allow_script"]);
                }
            } else {
                if(cookie["execute_header"] == true) {
                    head_scripts.push(cookie["disallow_script"]);
                } else {
                    body_scripts.push(cookie["disallow_script"]);
                }
            }
        });
        $("head").append(head_scripts.join("\n"));
        $("body").append(body_scripts.join("\n"));
    }

    /* Run all functions */

    function cookielay_run_all_functions() {
        var head_scripts = [],
            body_scripts = [];
        cookielay_cookies_cookies.forEach(function(cookie) {
            if(cookie["execute_header"] == true) {
                head_scripts.push(cookie["disallow_script"]);
            } else {
                body_scripts.push(cookie["disallow_script"]);
            }
        });
        $("head").append(head_scripts.join("\n"));
        $("body").append(body_scripts.join("\n"));
    }

    /* Init Cookielay */

    function init_cookielay() {
        if(cookielay_check_variables()) {
            if(cookielay_check_bots() || cookielay_check_exceptions()) {
                cookielay_run_all_functions();
            } else {
                if(cookielay_check_cookie() && cookielay_check_token()) {
                    cookielay_run_functions();
                } else {
                    setTimeout(function() {
                        cookielay_show();
                    }, cookielay_settings_delay);
                }
            }
        } else {
            console.error("Error: Cookielay could not initialize!");
        }
    }
    init_cookielay();
    
})(jQuery);