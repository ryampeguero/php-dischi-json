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
            const url = "http://localhost/boolean/php-dischi-json/server.php";
            const data = {
                action: "favourite"
            };

            axios.post(url, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
            ).then((resp) => {
                console.log(resp);
                if (this.filterFlag == false) {
                    this.diskList = resp.data.results;
                    this.filterFlag = true;
                } else {
                    axios.post(url).then((resp) => {
                        this.diskList = resp.data.results;
                        this.filterFlag = false;
                    });
                }
            });

            //     axios.post(url, data, {
            //         headers: {
            //             'Content-Type': 'multipart/form-data'
            //         }
            //     }).then((resp) => {
            //         console.log("Eccomi", resp);
            //         if (this.filterFlag == false) {
            //             this.diskList = resp.data.results;
            //             this.filterFlag = true;
            //         } else {
            //             axios.get("http://localhost/boolean/php-dischi-json/server.php").then((resp) => {
            //                 console.log(resp);
            //                 this.diskList = resp.data.results;
            //                 this.filterFlag = false;
            //             })
            //         }

            //     })
            // }
        }
    }
}).mount("#app");