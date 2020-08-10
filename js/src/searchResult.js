

const allInfo = ((item,i) => `

    <div class="frontoverlay__container-item" style="background-image: url('${item.image}')">
    <h3><a href="${item.link}">${item.title}</a></h3>
    <p><a href="${item.link}">${item.description}</a></p>
    </div>
`);


export const searchResult = (results) => {

    const frontContent = document.querySelector('.frontoverlay__content');

    frontContent.innerHTML = '';


    const searchoutput = `

    

             <div class="frontoverlay__container" data-simplebar data-simplebar-auto-hide="false">

                ${results.map((items,i) => allInfo(items,i)).join('')}
    
            </div>

    
    `;

    frontContent.insertAdjacentHTML('beforeend', searchoutput);


}