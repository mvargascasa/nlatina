class Country {

    static country_id = 1;

    static setCountryId(id){
        this.country_id = id;
        console.log('ID SETEADO ' + this.country_id);
    }
    
    static getCountryId(){
        console.log('GET ID ' + this.country_id);
        return this.country_id;
    }
}