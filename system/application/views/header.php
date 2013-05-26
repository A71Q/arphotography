<html>
    <head>
        <link rel="shortcut icon" href="/arp/images/favicon.ico" />
        <link href="/arp/css/base.css" rel="stylesheet" type="text/css">
        <link href="/arp/css/reset-fonts-grids.css" rel="stylesheet" type="text/css">
        <link href="/arp/css/common_new.css" rel="stylesheet" type="text/css">


        <script type="text/javascript" src="/arp/js/jquery-latest.pack.js"></script>
        <script type="text/javascript" src="/arp/js/jquery.form.js"></script>
        <script type="text/javascript" src="/arp/js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="/arp/js/commonTask.js"></script>


        <link href="/arp/css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" media="screen">
        <script type="text/javascript" src="/arp/js/jquery.lightbox-0.5.js"></script>
        
        <script type="text/javascript">
            $(function() {
               $('#gallery a').lightBox({
                    overlayBgColor: '#000',
                    overlayOpacity: 0.7,
                    containerResizeSpeed: 350,
                    showImageNumbering: false,
                    txtImage: 'Image',
                    txtOf: 'of',
                    imageLoading:			'/arp/images/lightbox-ico-loading.gif',
                    imageBtnPrev:			'/arp/images/lightbox-btn-prev.gif',
                	imageBtnNext:			'/arp/images/lightbox-btn-next.gif',
                    imageBtnClose:			'/arp/images/lightbox-btn-close.gif',
                    imageBlank:				'/arp/images/lightbox-blank.gif'

               });
            });
        </script>
        <title>AR Photography</title>
    </head>
    <body>
        <center>
            <div id="container">

                <div id="header">
                    <div id="title">AR Photography</div>
                    <div id="nav">
                        <a href="<? echo site_url('welcome');?>"><span>Home</span></a>
                        <a href="<? echo site_url('gallery_controller');?>"><span>Galleries</span></a>
                        <a href="<? echo site_url('feedback_controller');?>"><span>Contact/Feedback</span></a>
                        <a href="http://atiqurrahman.wordpress.com/"><span>Blog</span></a>
                        <a href="<? echo site_url('admin/login_controller');?>"><span>Admin</span></a>
                    </div>

                </div>