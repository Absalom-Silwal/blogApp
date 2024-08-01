
getBlogs();
getCategories();
function blogTemplator(blogs){

    const blogHtml = blogs.data.map(function(blog){
        const d = new Date(blog.created_at);
       
        return `<div class="post-item">
            <div class="post-img"><img src="/getFile?file=${blog.image_path}" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">${blog.title??''}</p>
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
        return `<div class="post-item">
              <a href="simple-post.html" class="post-title">${category.name} <span>(6)</span></a>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> ${d.getDate()} ${d.getMonth()} ${d.getFullYear()}</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
            </div>`
    }).join('');

    $('.categories').empty().html(categoriesHtml);
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

$('.show-modal').off('click').on('click',function(e){
    e.preventDefault();
    const url = $(this).attr('data-route');
    $.ajax({
        url:url,
        method:'GET',
        success:function(resp){
            $('#bs-modal-content').empty().html(resp);
            $('#bs-modal').modal('show');
        },
        error:function(error){
            console.log(error);
        }
    });
});

$(document).off('click','.close').on('click','.close',function(e){
    e.preventDefault();
    $('#bs-modal').modal('hide');
});

$(document).off('click','#saveUpdate').on('click','#saveUpdate',function(e){
    e.preventDefault();
    var type = $(this).attr('data-type');
    const form = $(`#${type}SaveUpdateForm`);
    var templator = `${type}Templator`;
    const data = form.serializeArray();
    const typeId = $(this).attr('data-id');
    let url = `/create/${type}`;
    if(typeId){
        url = `/update/${type}/${Id}`;
    }
    $.ajax({
        url:url,
        method:"POST",
        data:data,
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
})

