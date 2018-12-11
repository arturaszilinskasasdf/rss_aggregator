<template>

    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="dropdown float-left"><h4>RSS feeds</h4></div>
                        <div class="dropdown float-right">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-item" v-on:click="filterByCategories(0)">All categories</div>
                                <div v-for="rssCategory in rssCategories">
                                    <div  class="dropdown-item" v-on:click="filterByCategories(rssCategory.id)">{{ rssCategory.name | capitalize }}</div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="list-group">
                        <div v-for="rssFeedItem in rssFeedItems" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1" v-on:click="showRssFeedItemModal(rssFeedItem)">{{ rssFeedItem.title | rss_title }}</h5>
                                <small>{{ rssFeedItem.date }}</small>
                            </div>
                            <a v-bind:href="rssFeedItem.rss_feed.rss_provider.link" target="_blank"><small>{{ rssFeedItem.rss_feed.rss_provider.name }}</small></a>
                        </div>
                    </div>

                    <nav>
                        <ul class="pagination justify-content-center pt-3">
                            <li v-on:click="showPrev()" class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li v-on:click="showNext()" class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
//    import modal from './components/Modal.vue';
    export default{



        data(){
            return{
                rssFeedItems: [],
                rssCategories: [],

                categoryId: 0,
                page: 1,
                paginate: 10,
            }
        },
  
        created(){
            this.fetchRssFeedItems();
            this.fetchRssCategories();
        },

        methods:{
            fetchRssFeedItems(){

                var params = {}

                if(this.categoryId != 0){
                    params.category_id = this.categoryId
                }

                params.page = this.page
                params.paginate = this.paginate

                var queryString = Object.keys(params).map(key => key + '=' + params[key]).join('&');

                fetch('rss/feed_items?'+queryString)
                    .then(res => res.json())
                    .then(res => {

                        if(res.data.length!=0)
                            this.rssFeedItems = res.data;
                        else{
                            this.page = this.page - 1
                        }
                    }
                )
            },
            fetchRssCategories(){

                fetch('rss/categories')
                    .then(res => res.json())
                    .then(res => {

                        this.rssCategories = res.data;
                        this.fetchRssFeedItems();

                    }
                )
            },

            filterByCategories: function (categoryId) {

                this.page = 1;
                this.categoryId = categoryId
                this.fetchRssFeedItems();

            },

            showRssFeedItemModal: function (rssFeedItem) {

                this.$modal.show('dialog', {
                    title: rssFeedItem.title,
                    text: rssFeedItem.description,
                    buttons: [
                        {
                            title: 'Go to feeds page',
                            handler: () => { window.open(rssFeedItem.link); }
                        },
                        {
                            title: '',       // Button title
                            default: true,    // Will be triggered by default if 'Enter' pressed.
                            handler: () => {} // Button click handler
                        },
                        {
                            title: 'Close'
                        }
                    ]
                })

            },

            showNext(){
                this.page = this.page + 1,
                this.fetchRssFeedItems();
            },

            showPrev(){

                if(this.page > 1){
                    this.page = this.page - 1
                }

                this.fetchRssFeedItems();
            }

        }

    }
</script>


