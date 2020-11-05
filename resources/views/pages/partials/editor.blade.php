window.addEventListener('load', function() {
    var editor;

    editor = ContentTools.EditorApp.get();
    editor.init('*[data-editable]', 'data-name');

    ContentTools.StylePalette.add([
        new ContentTools.Style('Heading', ['text-lg leading-6 font-medium text-gray-900'], ['h1', 'h2'])
    ]);

    editor.addEventListener('saved', function (ev) {
        var name, payload, regions, xhr;

        // Check that something changed
        regions = ev.detail().regions;
        if (Object.keys(regions).length == 0) {
            return;
        }

        // Set the editor as busy while we save our changes
        this.busy(true);

        // Collect the contents of each region into a FormData instance
        payload = new FormData();
        for (name in regions) {
            if (regions.hasOwnProperty(name)) {
                payload.append(name, regions[name]);
            }
        }

        // Send the update content to the server to be saved
        function onStateChange(ev) {
            // Check if the request is finished
            if (ev.target.readyState == 4) {
                editor.busy(false);
                if (ev.target.status == '200') {
                    // Save was successful, notify the user with a flash
                    new ContentTools.FlashUI('ok');
                } else {
                    // Save failed, notify the user with a flash
                    new ContentTools.FlashUI('no');
                }
            }
        };

        xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', onStateChange);
        xhr.open('POST', '{{ route('public.save', [$page->slug, "_token" => csrf_token()]) }}');
        xhr.send(payload);

        window.location.reload();
    });
});