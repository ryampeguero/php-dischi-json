const { createApp } = Vue;

createApp({
    data() {
        return {
            diskList: [],
            filterFlag: false,
        }
    },

    created() {
        axios.get("http://localhost/boolean/php-dischi-json/server.php").then((resp) => {
            console.log(resp);
            this.diskList = resp.data.results;
        })
    },
    methods: {
        prova() {
            // console.log("sono qui!");
            
            axios.get("http://localhost/boolean/php-dischi-json/server.php?filter=on").then((resp) => {
                console.log("Eccomi", resp);
                if (this.filterFlag == false) {
                    this.diskList = resp.data.results;
                    this.filterFlag = true;
                } else {
                    axios.get("http://localhost/boolean/php-dischi-json/server.php").then((resp) => {
                        console.log(resp);
                        this.diskList = resp.data.results;
                        this.filterFlag = false;
                    })
                }

            })
        }
    }
}).mount("#app");