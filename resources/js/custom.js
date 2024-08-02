var isModalOpen = false;
getBlogs();
getCategories();
function blogTemplator(blogs){

    const blogHtml = blogs.data.map(function(blog){
        const d = new Date(blog.created_at);
       const isUser = $('#isUser').val();
       
        return `<div class="post-item">
            <div class="post-img"><img src="/getFile?file=${blog.image_path}" alt=""></div>
            <div class="post-main-info">
              <span class="post-title">${blog.title??''} </span><br> ${isUser=='true'?`<span><a href="#" class="show-modal" data-route="/addEdit/blog?id=${blog.id}">Edit</a></span>`:''}
              <div class="post-meta">
                <span><i class="far fa-calendar"></i> ${d.getDate()} ${d.getMonth()} ${d.getFullYear()}</span>
              </div>
              <p>${blog.body}</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>`
    }).join('');
    
    $('.all-posts').empty().html(blogHtml);
    if(blogs.total){
        const pages = pageTemplator(blogs.links);
        $('.pagination').empty().html(pages);
    }
    
}
function categoriesTemplator(categories){
    const categoriesHtml = categories.data.map(function(category){
        const d = new Date(category.created_at);
        const isUser = $('#isUser').val();
        return `
                <li class="list-group-item">
                    ${category.name}<span> (${category.blogs_count})</span>
                    ${isUser=='true'?`<span class="float-end"><a href="#" class="show-modal" data-route="/addEdit/category?id=${category.id}">Edit</a></span>`:''}
                </li>
              
                `
    }).join('');

    $('.categories-list').empty().html(categoriesHtml);
}
function pageTemplator(links){
    return links.map(function(link){
        return ` 
            <li class="page-item">
                <a class="page-link active" data-link=${link.url} ${link.active?'':'disabled'}>${link.label}</a>
            </li>
     `;
    }).join('');
}
$(document).off('click','.page-link').on('click','.page-link',function(e){
    e.preventDefault();
    const pageLink = $(this).attr('data-link');
    if(pageLink){
        getBlogs(pageLink);
    }
   
});
function getBlogs(url=null){
    
    if(!url){
        url = '/get/blog';
    }
 $.ajax({
    url:url,
    method:'GET',
    success:function(resp){
        //console.log(resp);
        blogTemplator(resp);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    error:function(err){
        console.log(err);
    }
 });
}

function getCategories(){
    $.ajax({
        url:'/get/category',
        method:'GET',
        success:function(resp){
            //console.log(resp);
            categoriesTemplator(resp);
        },
        error:function(err){
            console.log(err);
        }
    });    
}
function checkModalOpen(){
    if(isModalOpen){
        $(document).find('.close').trigger('click');
    }
}
var searchAjax =null; 
$('#search-input').off('input').on('input',function(e){
    e.preventDefault();
    
    const searchValue = $(this).val();
    if(searchAjax){
        searchAjax.abort();
    }
    searchAjax = $.ajax({
                url:'/get/blog',
                method:'GET',
                data:{
                    search:searchValue
                },
                success:function(resp){
                    //console.log(resp);
                    blogTemplator(resp);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                error:function(err){
                    console.log(err);
                }
            });

});

$(document).off('click','.show-modal').on('click','.show-modal',function(e){
    e.preventDefault();
    const url = $(this).attr('data-route');
    checkModalOpen();
    $.ajax({
        url:url,
        method:'GET',
        success:function(resp){
            $('#bs-modal-content').empty().html(resp);
            
            $('#bs-modal').modal('show');
            isModalOpen = true;
        },
        error:function(error){
            console.log(error);
        }
    });
});

$(document).off('click','.close').on('click','.close',function(e){
    e.preventDefault();
    $('#bs-modal').modal('hide');
    isModalOpen = false;
});

$(document).off('click','#saveUpdate').on('click','#saveUpdate',function(e){
    e.preventDefault();
    var type = $(this).attr('data-type');
    const form = $(`#${type}SaveUpdateForm`);
    var templator = `${type}Templator`;
    let formData = new FormData(form[0]);
    // if(form.find('#image').length){
    //     const image = form.find('#image')[0].files;
    //     if (image.length) {
    //         formData.append('image', image[0]);
    //     }
    // }
    const typeId = $(this).attr('data-id');
    let url = `/create/${type}`;
    if(typeId){
        url = `/update/${type}/${typeId}`;
    }
    $.ajax({
        url:url,
        method:"POST",
        data:formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success:function(resp){
            if(type=='blog'){
                blogTemplator(resp);
            }
            else{
                categoriesTemplator(resp);
            }
            
            $(document).find('.close').trigger('click');
        },
        error:function(error){
            console.log(error);
        }
    }); 
});

$(document).off('click','#login').on('click','#login',function(e){
    e.preventDefault();
    console.log('clicked');
    var form = $(this).closest('form');
    const data=form.serializeArray();
    $.ajax({
        url:'/login',
        method:'POST',
        data:data
    }).done(function(resp){
        $(document).find('.close').trigger('click');
        location.reload();
    }).fail(function(err){
        const resp = err.responseJSON;
        if(Object.keys(resp.errors).length){
            for (let key in resp.errors) {  
                
                const errors = resp.errors[key];
                const errorLi = errors.map(function(error){
                    return  `<li>${error}</li>`;
                }).join('');
                form.find(`[name=${key}]`).siblings('.errors').html(`<ul class="list-unstyled text-danger">${errorLi}</ul>`);
              }
        }
    });
        
    
});


$(document).off('click','#register').on('click','#register',function(e){
    e.preventDefault();
    var form = $(this).closest('form');
    const data=form.serializeArray();
    
    $.ajax({
        url:'/register',
        method:'POST',
        data:data
    }).done(function(resp){
        console.log(resp);
        $(document).find('.close').trigger('click');
        // location.reload();
    }).fail(function(err){
        const resp = err.responseJSON;
        if(Object.keys(resp.errors).length){
            for (let key in resp.errors) {  
                
                const errors = resp.errors[key];
                const errorLi = errors.map(function(error){
                    return  `<li>${error}</li>`;
                }).join('');
                form.find(`[name=${key}]`).siblings('.errors').html(`<ul class="list-unstyled text-danger">${errorLi}</ul>`);
              }
        }
    });
        
    
});

$('#logout').off('click').on('click',function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'/logout',
        method:'POST',
    }).done(function(resp){
        $(document).find('.close').trigger('click');
         location.reload();
    }).fail(function(err){
        const resp = err.responseJSON;
        console.log(resp);
    });
});



