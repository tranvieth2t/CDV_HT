<script src="https://cdn.tiny.cloud/1/1pxe13faq42hs5q9zvubh9cmmtvm1kyiynvk3wp325f0oi60/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<script !src="">
    tinymce.init({
        height: 800,
        selector: 'textarea#notify-content',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: '{{Auth::user()->name ?? ""}}',
        plugins: ' advcode casechange image editimage linkchecker  lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments',
        // toolbar: 'undo redo | addcomment showcomments | casechange checklist code | image editimage pageembed  table ',
        toolbar: 'undo redo | addcomment showcomments | casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'code table image | bullist numlist checklist outdent indent ',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        language: 'vi',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];
                let allowedExtension = ['image/jpeg', 'image/jpg', 'image/png'];
                if (allowedExtension.indexOf(file.type) < 0) {
                    $('#error-modal-content').text('jpg・pngのファイル形式の画像をご選択ください。');
                    $('#error-modal').modal();
                    return false;
                }
                if (file.size > parseInt(2000000)) {
                    $('#error-modal-content').text('Không tải lên ảnh lớn hơn 2MB。');
                    $('#error-modal').modal();
                    return false;
                }
                img = new Image();
                var _URL = window.URL || window.webkitURL;
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    var max_size = parseInt(100000)
                    if (this.width < this.height || this.width > max_size || this.height > max_size) {
                        $('#error-modal-content').text('Ảnh tải lên phải là ảnh ngang');
                        $('#error-modal').modal();
                        return false;
                    }

                    _URL.revokeObjectURL(objectUrl);
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };
                img.src = objectUrl;
            };
            input.click();
        },
        content_style: 'body { font-family: Roboto,Arial,sans-serif; font-size:14px }'
    });
</script>