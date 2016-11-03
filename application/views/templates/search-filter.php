        <div class="block search-block">
            <h4 class="site-descriptior">
                Post and find services close to you
            </h4>
            <div class="search-filters">
                <form class="form-search">
                    <div>
                        <input type="text" class="form-control search-control" placeholder="eg Painter">
                    </div>
                    <div class="hide-on-mobile">
                        <select class="form-control search-control">
                            <option>All Categories</option>
                            <?
                                foreach($base_categories as $category){
                                    echo '<option>'.$category->category_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="hide-on-mobile">
                        <select class="form-control search-control">
                            <option>All Locations</option>
                            <?
                                foreach($states as $state){
                                    echo '<option>'.$state->state_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-block search-control btn-search">Find</button>
                    </div>
                </form>
            </div>
        </div>