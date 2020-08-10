import _ from 'lodash';

import 'simplebar'; // or "import SimpleBar from 'simplebar';" if you want to use it manually.
import 'simplebar/dist/simplebar.css';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import search from '../src/search';
import {searchResult} from '../src/searchResult';


// Selecting Elements

const searchInput = document.getElementById('search');
const frontOverlay = document.querySelector('.frontoverlay');
const navWrap = document.querySelector('.nav__wrap');
const form = document.querySelector('.frontoverlay__form');
const frontContent = document.querySelector('.frontoverlay__content');
const searchIcon = document.querySelector('.nav__search');
const loadIcon = document.querySelector('.loadicon');   
const cancelIcon = document.querySelector('.cancelicon');   
const navMenu = document.querySelector('.nav__menuicon');   
const navMenuContainer = document.querySelector('.menu-menu-1-container');   
const navMenuClose = document.querySelector('.nav__closeicon'); 
const hero = document.querySelector('.hero'); 
const cardMove = document.querySelector('.content__aside-card-move'); 
const cardMo = document.querySelector('.content__aside-card-mo'); 
const card = document.querySelector('.content__cards-card'); 
const inputFocus = document.querySelectorAll('input, textarea');

// Opening Search 
searchIcon.addEventListener('click',() =>{

    animateFrontoverlay();


})

// Closing Search 
cancelIcon.addEventListener('click',() =>{

    animateCloseFront()

})

// Function To Close Animate FrontOverlay

const animateCloseFront = () => {

    gsap.to('.frontoverlay', {opacity: 0, display: 'none', duration: 1.3,y: "-100%"});

}


// Function To Animate FrontOverlay

const animateFrontoverlay = () =>{

    frontOverlay.style.display = 'grid';

            gsap.to('.frontoverlay', {

                opacity:1,
                y:"0%",
                duration:1.3
            });
            searchInput.focus();

}

// Closing and Opening Search By Keys
document.addEventListener('keyup', (e) =>{


    console.log(e.keyCode);

    if(e.keyCode == 83){
        

           

        const inputF = document.activeElement.tagName;
             
        if(inputF == 'TEXTAREA' ||  inputF == 'INPUT'){
            
            
        }else{

            animateFrontoverlay()
            
        }

    }
    if(e.keyCode == 27){


        
        animateCloseFront()
        // frontOverlay.style.display = 'none';

    }

})

let inputLetters;

form.addEventListener('submit', (e) => {

    e.preventDefault();
});

// SearchResult Control
const searchResultControl = async (e) =>{


    e.preventDefault();

    let searchValu = searchInput.value;


    if(searchValu == ''){
            
        frontContent.innerHTML = '';
            
        return
    }
    if(inputLetters == searchValu)  return;


    try{
        
        inputLetters = searchValu;
        loadIcon.style.display = 'block';
        await search(searchValu).then(data => {
            
            if(data.length != 0){

                loadIcon.style.display = 'none';

                searchResult(data);
            }else{

                loadIcon.style.display = 'none';
                loadIcon.insertAdjacentHTML('afterend', '');
                const noResult = document.querySelector('.noresult');
                frontContent.innerHTML = ''; 
                
                const frontResult = `<p class="noresult">للاسف, لا يوجد نتائج.</p>`;
                frontContent.insertAdjacentHTML('beforeend', frontResult);


            }
            
            
    
            
        })

    }
    catch(err){
        console.log(err)
    }

}




// SearchInput Eventlistener
searchInput.addEventListener('keyup', searchResultControl)

// Opening Menu
navMenu.addEventListener('click' , (e) =>{

    navWrap.style.display = 'block';

    gsap.to('.nav__wrap', {

        opacity:1,
        x:"0%",
        duration:1.3
    });
    
    navMenuClose.style.display = 'block';


})



// Closing Menu
navMenuClose.addEventListener('click', (e) => {

    // navMenuClose.style.display = 'none';
    // navWrap.style.display = 'none';

    gsap.to('.nav__wrap', {opacity: 0, display: 'none', duration: 1.3,x: "-103%"});



})


// Adding Animation To The DOM

if(hero){


    gsap.from(".hero__content", {
        x:-200,
        opacity: 0,
        duration: 1.5,
        
    });
    gsap.from(".hero__img-overlay", {
        y:-100,
        opacity: 0,
        duration: 1,
    
    });
    gsap.from(".hero__image", {
        y: 200,
        opacity: 0,
        duration: 1.5,
    
    });


}

if(cardMo){

    gsap.from(".content__aside-card-mo", {
        
        scrollTrigger: {
            trigger: '.content__aside-card',
            toggleActions: 'play pause resume reset',
            start: '-544px 44%',
            scrub: .1,
            // markers: true
        },
        stagger: 1,
        y: 200,
        opacity: 0,
        duration: 1,
    });

}


if(cardMove){


    gsap.from(".content__aside-card-move", {
    
        scrollTrigger: {
            trigger: '.content__aside-card',
            toggleActions: 'play pause resume reset',
            start: '-484px 44%',
            scrub: .1,
            // markers: true
        },
        stagger: 1,
        y: 200,
        opacity: 0,
        duration: 2,
    });


}


if(card){

    gsap.from(".content__cards-card", {
        
        scrollTrigger: {
            trigger: '.content__cards-card',
            toggleActions: 'play play resume reset',
            start: '=-790 top',
           
            // markers: true
        },
        stagger: 1,
        y: 200,
        opacity: 0,
        duration: 1.6,
    });

}

