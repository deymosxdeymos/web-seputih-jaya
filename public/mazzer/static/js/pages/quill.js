var quill = new Quill('#editor', {
    theme: 'snow', // or 'bubble' for a different theme
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],     // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean'],                                         // remove formatting button

            ['link', 'image', 'video']                         // link and image, video
        ]
    }
});

var form = document.getElementById('myForm');

form.onsubmit = function() {
    // Ubah format tanggal sebelum dikirim ke server
    let inputDate = document.getElementById('tgl-column').value;
    let formattedDate = formatDate(inputDate);
    document.getElementById('tgl').value = formattedDate;

    function formatDate(inputDate) {
        let date = new Date(inputDate);
        let options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit', timeZoneName: 'short' };
        return date.toLocaleDateString('id-ID', options);
    }
    // Get Quill content
    var content = quill.root.innerHTML;

    // Set Quill content to the hidden input
    document.getElementById('content').value = content;

    // Continue with form submission
    return true;
};


