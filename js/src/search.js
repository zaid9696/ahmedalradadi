export default async function search(searchValue){


    try{

        const result = await  fetch(`${alrdadiUri.root_uri}/wp-json/alradadi/v1/search?term=${searchValue}`);
        const data = await result.json();

        console.log(data)

        return data;


    }

    catch(err){

        console.log(err)
    }


}