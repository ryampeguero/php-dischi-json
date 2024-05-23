const {createApp} = Vue;

createApp({
    data(){
        return{
            diskList: [],
        }
    },

    created(){
        axios.get("http://localhost/boolean/php-dischi-json/server.php").then((resp) => {
            console.log(resp);
            this.diskList = resp.data.results;
        })
    }, 
    methods: {
    }
}).mount("#app");