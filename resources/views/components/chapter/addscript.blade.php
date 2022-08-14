<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        const textarea = document.getElementById('chapter_post');
        const id = document.getElementById('manga_slugs');
        const slug = document.getElementById('chapter_slugs');
        Dropzone.autoDiscover = false;
        slug.addEventListener('keypress', () => {



            // Dropzone class:
            if (event.key === "Enter") {
                // Cancel the default action, if needed
                event.preventDefault();
                var myDropzone = new Dropzone("div#mydropzone", {
                    parallelUploads: 1,
                    headers: {
                        'X-CSRF-TOKEN': $("#a_token").val()
                    },
                    url: `/api/${id.value}/${slug.value}/image`
                })
                myDropzone.on("success", function(first, response) {
                    textarea.value += `<img src='${response}'>`
                });
            }
        })



    });
</script>