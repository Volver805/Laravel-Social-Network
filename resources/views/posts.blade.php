@extends('layouts.main')
@section('content')
 <div class="posts-body">
    <div id="post-data">

    </div>
    <input type="hidden" id='last-post' value='0'>
    <button id='show' style="display:block;margin:0 auto;margin-top:40px;background-color:#27AE60;color:white;border:0;width:160px;height:40px;font-weight:bold;" >Show more</button>
</div>
<script>
    $(document).ready(()=> {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const load = (id=$('#last-post').val()) => {
            let html;
            $.ajax({
                url: "/test",
                method: "POST",
                data:{id:id},
                success: data=> {
                    if(!data[1]) {
                        $('#show').css('display','none');
                    } else {
                    html = "";
                    data.forEach(post => {
                        html += `<h1>${post['title']}</h1><p>${post['body']}</p>${post['id']}`;
                        $("#last-post").val(post['id']); 
                    });
                    $('#post-data').append(html);
                    }
                }
            });
        }
        $('#show').click(load);
    });

</script>

@endsection
