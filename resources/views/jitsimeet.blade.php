<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <body style="width: 100%;">
        <div class="col-md-12">
            <script src="https://meet.jit.si/external_api.js"></script>
            <script>
                var domain = "meet.jit.si";
                var options = {
                    roomName: "essentiel1",
                    // width: 700,
                    // height: 200,
                    parentNode: undefined,
                    configOverwrite: {},
                    // interfaceConfigOverwrite: {
                    //     LANG_DETECTION: true,
                    //     TOOLBAR_BUTTONS: ['microphone', 'camera', 'tileview'],
                    //     filmStripOnly: false,
                    //     DEFAULT_BACKGROUND: '#4dbdea'
                    // },
                    fileRecordingsEnabled: true,
                    liveStreamingEnabled: true
                }
                var api = new JitsiMeetExternalAPI(domain, options);
            </script>
        </div>
    </body>
</html>