let sliderIndex = 0;
let rigthArrow = document.querySelector('.rigth-arrow');
let leftArrow = document.querySelector('.left-arrow');
let sliderItemList = document.querySelectorAll('.slider-item');

let backToTopButton = document.querySelector('.back-to-top-button');

let ChangeProductCountBase = document.querySelector('.add-to-card-count');
let productCountInDetails = document.getElementById('productCount');

let sendComment = document.getElementById('send-comment');
let commentsList = document.getElementById('comments');
let commentDescription = document.getElementById('description');
let commentHeader = document.querySelector('.comment-header #header');
let productId = document.getElementById('productId');
let userId = document.getElementById('userId');

let btnList = document.getElementsByClassName('like-comment-btn');

let showLikedMembers = document.getElementsByClassName('showLikedMembers');
let closeLikedMembersList = document.getElementById('closeLikedMembersList');


let login = document.getElementById('login');
let loginEmail = document.getElementById('email');
let loginPassword = document.getElementById('password');
let rememberMe  = document.getElementById('remember_me');

let saveUser = document.getElementById('saveUser');
let TC = document.getElementById('TC');
let Name = document.getElementById('Name');
let Surname = document.getElementById('Surname');
let Email = document.getElementById('Email');
let Address = document.getElementById('Address');
let Day = document.getElementById('Day');
let Month = document.getElementById('Month');
let Year = document.getElementById('Year');
let Password = document.getElementById('Password');
let rePassword = document.getElementById('rePassword');



let addToCardButton = document.getElementById('addToCardButton');
let CardProductCount = document.getElementById('CardProductCount');
let trashProduct = document.getElementById('trash-product');

window.onload = function () {

    AddEventsToItems();

    if (sliderItemList.length > 0) {

        sliderItemList[sliderIndex].style.display = 'block';

        setInterval(() => {
            increaseSlideIndex();
        }, 3000);
    }

    if(btnList){
        AddOrRemoveLike();
    }
    if(showLikedMembers){
        showLikedMembersToUI();
    }
}


function AddEventsToItems() {

    addEventInExistItem(ChangeProductCountBase, 'click', changeProductCount);
    addEventInExistItem(rigthArrow, 'click', increaseSlideIndex);
    addEventInExistItem(leftArrow, 'click', decraseSlideIndex);
    addEventInExistItem(window, 'scroll', showBackToTopButton);
    addEventInExistItem(backToTopButton, 'click', clearScroll);
    addEventInExistItem(login, 'click', ControlToUserLogin);
    addEventInExistItem(saveUser, 'click', CreateMember);
    addEventInExistItem(sendComment, 'click', PostComment);
    addEventInExistItem(closeLikedMembersList, 'click', closeLikedList);
    addEventInExistItem(addToCardButton,'click',addToCard);
    addEventInExistItem(trashProduct,'click',RemoveProductInCard);
}

function RemoveProductInCard(e){
    
}

function addToCard(e){
    let url = '/card/add';
    let data = {
        productId : productId.value,
        productCount : productCount.value
    };

    new Post(url,data, function(value){
        let message  = JSON.parse(value).message;
        let productCount = JSON.parse(value).productCount;

        CardProductCount.innerText = productCount;
        alert(message);
    });
}

function closeLikedList(e){
    e.target.parentNode.parentNode.style.display = 'none';
}

function showLikedMembersToUI(){
    Array.from(showLikedMembers).forEach(function(item){
        item.addEventListener('click',function(e){

            let currentElement = e.target;
            
            
            let url = '/comment/show_liked_members';

            data = {
                commentId : currentElement.getAttribute('duygu')
            };

            new Post(url,data,function(value){
                let likedMemberList = document.getElementById('liked-members-list');
                
                likedMemberList.innerHTML = '';

                likedMemberList.parentNode.parentNode.style.top = document.body.scrollTop + "px"


                value = JSON.parse(value);

                value.forEach(function(data){
                    var element = document.createElement('li');
                    element.innerText = data.Name + ' ' + data.Surname;

                    likedMemberList.appendChild(element);
                });

                likedMemberList.parentNode.parentNode.style.display = 'block';

            });
        });
    });
}

function AddOrRemoveLike(){

    Array.from(btnList).forEach(function(value){
        value.addEventListener('click',function(e){
            
            let currentElement = e.target;

            let url = '/comment/comment_like';
            let data = {
                CommentId : currentElement.getAttribute('duygu')
            };

            new Post(url,data,function(response){
                currentElement.classList.toggle('bg-error');
                currentElement.classList.toggle('bg-success');
                
                let likeCount = currentElement.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerText;
                
                if(response == 1){
                 currentElement.innerHTML = 'Beğenmekten Vazgeç';   
                 likeCount ++;   
                }
                else if(response == 0){
                 currentElement.innerHTML = 'Beğen';   
                 likeCount --;   
                }
                currentElement.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerText = likeCount;

            });
        });
    });
}

function PostComment(e) {
    let data = {
        Title: commentHeader.value,
        Description: commentDescription.value,
        MemberId: userId.value,
        ProductId: productId.value
    };

    let url = '/comment/add';

    new Post(url, data, function (value) {
        if (value == -1) {
            alert('ters giden bir şeyler var, lütfen daha sonra tekrar deneyiniz..');

        }
        else {
            value = JSON.parse(value);
            let comment = `<div class="comment">
                    <div class="comment-member-info">
                        <div class="comment-added-date">
                            <b> ${value.Name} ${value.Surname} </b>
                            <span> ${value.AddedDate} </span>
                        </div>
                        <div class="comment-like-cont">
                            Beğeni sayısı: <b>0</b>
                            <i style="font-size: 20px; color:#008e66;" class="fal fa-eye showLikedMembers" duygu="118"></i>
                        </div>
                        <br>
                        <div>
                            <span>Yorumu onaylıyor musunuz?</span>
                            <div>
                                <button duygu="${value.Id}" class="like-comment-btn bg-success">Beğen</button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="comment-info">
                        <div class="comment-title">
                            <span> ${value.Title} </span>
                        </div>
                        <div class="comment-description">
                        <span> ${value.Description} </span>
                        </div>
                    </div>
                </div>`;

            let commentTag = document.createElement('div');

            commentTag.innerHTML = comment;

            commentsList.insertBefore(commentTag, commentsList.firstChild);

            commentHeader.value ='';
            commentDescription.value ='';
            
            
            showLikedMembers = document.getElementsByClassName('showLikedMembers');
            btnList = document.getElementsByClassName('like-comment-btn');
            
            console.log(btnList);
            clearClickEvent(btnList);
                 
            
            // clearClickEvent(showLikedMembers);

            // showLikedMembersToUI();            
        }
    });

}

function CreateMember(e) {

    e.preventDefault();

    let list = ControlToMemberSingUpForm();

    ChangeBorderColor(list);

    if (list)
        return;

    let data = {
        'TC': TC.value,
        'Name': Name.value,
        'Surname': Surname.value,
        'Email': Email.value,
        'Address': Address.value,
        'Day': Day.value,
        'Month': Month.value,
        'Year': Year.value,
        'Password': Password.value
    };

    let url = '/signup/create';

    new Post(url, data, function (response) {
        if (response == 0)
            alert('lütfen bütün alanları doldurunuz..');
        else if (response == -1)
            alert('böyle bir kullanıcı zaten bulunuyor...');
        else if (response == 1) {
            alert('kayıt başarılı, yönlendiriliyorsunuz... :)))');
            window.location = '/profile';
        }

    });

}

function ControlToMemberSingUpForm() {

    let argList = [];

    if (TC.value.length != 11)
        argList.push(TC);
    if (!Name.value)
        argList.push(Name);
    if (!Surname.value)
        argList.push(Surname);
    if (!validateEmail(Email.value))
        argList.push(Email);
    if (!Address.value)
        argList.push(Address);
    if (Day.value == -1)
        argList.push(Day);
    if (Month.value == -1)
        argList.push(Month);
    if (Year.value == -1)
        argList.push(Year);
    if (!Password.value)
        argList.push(Password);
    if (!rePassword.value)
        argList.push(rePassword);
    if (Password.value && rePassword.value && Password.value != rePassword.value) {
        argList.push(Password)
        argList.push(rePassword);
    }

    return argList.length == 0 ? null : argList;
}

function ClearBorderColor() {
    TC.style.borderColor = '#b5b5b5';
    Name.style.borderColor = '#b5b5b5';
    Surname.style.borderColor = '#b5b5b5';
    Email.style.borderColor = '#b5b5b5';
    Address.style.borderColor = '#b5b5b5';
    Day.style.borderColor = '#b5b5b5';
    Month.style.borderColor = '#b5b5b5';
    Year.style.borderColor = '#b5b5b5';
    Password.style.borderColor = '#b5b5b5';
    rePassword.style.borderColor = '#b5b5b5';
}

function ChangeBorderColor() {

    ClearBorderColor();

    if (arguments[0] != null && arguments[0].length > 0) {
        for (let i = 0; i < arguments[0].length; i++) {
            arguments[0][i].style.borderColor = 'red';
        }
    }
}

function ControlToUserLogin(e) {

    e.preventDefault();

    let data = {
        "email": loginEmail.value,
        "password": loginPassword.value,
        "remember_me" : rememberMe.checked ? 1 : 0
    };


    if (!data.email || !data.password) {
        alert('lütfen bütün alanları doldurunuz!');
        return;
    }

    let url = "login/control";

    new Post(url, data, function (value) {
            if (value == -1)
                alert('Hatalı kullanıcı adı veya parola');
            else if (value == 0)
                alert('Lütfen bütün alanları doldurunuz..');
            else {
                alert('giriş başarılı, yönlendiriliyorsunuz...');
                window.location = '/profile';
            }
    });

}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function showDescription() {
    let description = document.getElementById('temp');

    if (description.style.display == 'block') {
        description.style.display = 'none';
        document.getElementById('temp2').style.marginTop = '0px';
    }
    else {
        description.style.display = 'block';
        document.getElementById('temp2').style.marginTop = description.offsetHeight + 'px';
    }
}

function showComments() {
    let comments = document.getElementById('comments_base');

    if (comments.style.display == 'block') {
        comments.style.display = 'none';
        document.getElementById('temp2').style.marginTop = '0px';
    }
    else {
        comments.style.display = 'block';
        document.getElementById('temp2').style.marginTop = comments.offsetHeight + 150 + 'px';
    }

}

function clearScroll() {
    let loop = setInterval(() => {
        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            document.body.scrollBy(0, -50);
            document.documentElement.scrollBy(0, -50);
        }
        else {
            clearInterval(loop);
        }
    }, 20);
}

function showBackToTopButton() {
    if (backToTopButton) {

        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTopButton.style.display = 'flex';
        }
        else {
            backToTopButton.style.display = 'none';
        }
    }
}

function changeProductCount(e) {
    if (e.target.className == "increase-product") {
        productCountInDetails.value = parseInt(productCountInDetails.value) + 1;
    }
    else if (e.target.className == "decrease-product") {
        if (productCountInDetails.value > 0) {
            productCountInDetails.value -= 1
        }
    }
}

function SliderControl() {
    sliderIndex = sliderIndex < 0 ? sliderItemList.length - 1 : sliderIndex;
    sliderIndex = sliderIndex > sliderItemList.length - 1 ? 0 : sliderIndex;

    sliderItemList.forEach(function (value, key) {
        if (key == sliderIndex) {
            value.style.display = 'block';
            return;
        }
        value.style.display = 'none';
    });
}

function increaseSlideIndex() {
    sliderIndex += 1;
    SliderControl();
}

function decraseSlideIndex() {
    sliderIndex -= 1;
    SliderControl();
}

function addEventInExistItem(element, method, func) {
    if (element) {
        element.addEventListener(method, func);
    }
}