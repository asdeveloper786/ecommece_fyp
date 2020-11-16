<?php use App\Product; ?>
<form action="{{ url('/products-filter') }}" method="post">{{ csrf_field() }}
	@if(!empty($slug))
	<input name="slug" value="{{ $slug }}" type="hidden">
	@endif

				<div class="sidebar-categories">
                    <div class="head">Categories</div>
                    @foreach($categories as $cat)
                    @if($cat->status==1)
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable{{$cat->id}}" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span>{{$cat->name}}</a>
							<ul class="collapse" id="fruitsVegetable{{$cat->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                                @foreach($cat->categories as $subcat)
                                <?php $productCount = Product::productCount($subcat->id); ?>

                                @if($subcat->status==1)
                                            <li class="main-nav-list child"><a href="{{ asset('products/'.$subcat->slug) }}">{{$subcat->name}} <span class="number">({{ $productCount }}) </span> </a> </li>
                                @endif
                                        @endforeach
							</ul>
						</li>


                    </ul>
                    @endif
                    @endforeach
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Product Filters</div>
					<div class="common-filter">
						<div class="head">Color</div>

							<ul>
                                @foreach($colorArray as $color)
                                @if(!empty($_GET['color']))
                                    <?php $colorArr = explode('-',$_GET['color']) ?>
                                    @if(in_array($color,$colorArr))
                                        <?php $colorcheck="checked"; ?>
                                    @else
                                        <?php $colorcheck=""; ?>
                                    @endif
                                @else
                                    <?php $colorcheck=""; ?>
                                @endif

                                <li class="filter-list"> <input class="pixel-radio" name="colorFilter[]" onchange="javascript:this.form.submit();" id="{{ $color }}" value="{{ $color }}" type="checkbox" {{ $colorcheck }}>&nbsp;&nbsp;<span >{{ $color }}</span></li>

                            @endforeach
							</ul>

					</div>
					<div class="common-filter">
						<div class="head">Size</div>

							<ul>
                                @foreach($sizesArray as $size)
                                @if(!empty($_GET['size']))
                                    <?php $sizeArr = explode('-',$_GET['size']) ?>
                                    @if(in_array($size,$sizeArr))
                                        <?php $sizecheck="checked"; ?>
                                    @else
                                        <?php $sizecheck=""; ?>
                                    @endif
                                @else
                                    <?php $sizecheck=""; ?>
                                @endif

                             <li class="filter-list"> <input class="pixel-radio" name="sizeFilter[]" onchange="javascript:this.form.submit();" id="{{ $size }}" value="{{ $size }}" type="checkbox" {{ $sizecheck }}>&nbsp;&nbsp;<span >{{ $size }}</span></li>

                            @endforeach
							</ul>

					</div>

				</div>
            </form>


