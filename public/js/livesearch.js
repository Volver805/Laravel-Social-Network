$(document).ready(function() {
    function liveSearch() {
        $('.search-results').css('min-height','50px');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
            method: 'POST',
            url: '/tasks',
            data: {'name':$('#search-field').val()},
            dataType: 'json',
            success: data=> {
                let profiles = data.profiles;
                let posts = data.posts;
                let html = "";
                if(profiles.length != 0) {
                    html = "<h4>Users</h4>";
                    profiles.forEach(el => { 
                        html += `<a href='/profile/${el['id']}'><div class='user'><div class='text-container'><img src="${el['email']}" alt="" srcset=""><span>${el['name']}</span></div></div></a>`
                    });
                }
                if(posts.length != 0) {
                    html += "<h4>Posts</h4>";
                    posts.forEach(el => {
                        html += `<a href='/posts/${el['id']}'><div class="search-post">
                                <div class="text-container">
                                    <p>${el['title']}</p>
                                    <p class='author'>${el['created_by']}</p>
                                </div>
                            </div></a> `;
                    });
                }
                
                if(html == "") 
                    html = "<div class='user'><div class='text-container'>There's nothing to show</div></div>";
                $('.search-results').html(html);
           },
            error: err=> {
                console.log(err.responseText);
            }
            
        });
    }

    let timer = null,i  = 0;
    $('#search-field').keypress(()=> {
        if($('#search-field').val() == " ") {
            $('.search-results').html("");
            $('.search-results').css('min-height','0px');
            return;
        }
        //excute the function every three letters time & limit ajax requests sent per second
        if(i > 1) {
        clearTimeout(timer);
        timer = setTimeout(liveSearch(),1000);
        i=0;
        }
        i++;
    });
});  
