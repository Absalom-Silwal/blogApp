
function ajaxCall(parameter){
    return $.ajax(parameter);
}
function blogTemplator(blogs){
    const blogHtml = blogs.data.map(function(blog){
        return `<div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/architecture-1857175_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>`
    }).join('');
    const pages = pageTemplator(blogs.links);
    $('.all-posts').empty().html(blogHtml);
    $('.pagination').empty().html(pages);
}
function categoriesTemplator(categories){
    const categoriesHtml = categories.map(function(blog){
        return `<div class="post-item">
              <a href="simple-post.html" class="post-title">Fashion <span>(6)</span></a>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
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
    console.log(pageLink);
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