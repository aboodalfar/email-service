function initializeTinymce(onchange) {
    window.onload = () => {
        tinymce.init({
            selector: '#editor',
            plugins: 'print fullpage preview code powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
            autosave_ask_before_unload: true,
            image_advtab: true,
            height: 600,
            image_caption: true,
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table configurepermanentpen',
            setup: (ed) => {
                ed.on('change', (e) => onchange(ed.getContent()));
            }
        });

    }
};