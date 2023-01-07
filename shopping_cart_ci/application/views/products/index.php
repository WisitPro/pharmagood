
<h2>PRODUCTS</h2>
	
    <!-- Cart basket -->
    <div class="cart-view">
        <a href="<?php echo base_url('cart'); ?>" title="View Cart"><i class="icart"></i> (<?php echo ($this->cart->total_items() > 0)?$this->cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
    
    <!-- List all products -->
    <div class="row col-lg-12">
        <?php if(!empty($products)){ foreach($products as $row){ ?>
            <div class="card col-lg-3">
                <!-- <img class="card-img-top" src="<?php echo base_url('uploads/product_images/'.$row['image']); ?>" alt=""> -->
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["pro_name"]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'.$row["pro_price"].' USD'; ?></h6>
                    
                    <a href="<?php echo base_url('products/addToCart/'.$row['pro_id']); ?>" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        <?php } }else{ ?>
            <p>Product(s) not found...</p>
        <?php } ?>
    </div>