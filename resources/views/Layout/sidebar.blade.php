<div class="profile-sidebar">
	<div class="profile-userpic">
		<img src="../assets/gambar/admin.png" class="img-responsive" alt="Image">
	</div>
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">Admin</div>
		<div class="profile-usertitle-status"><span class="indicator label-success blink"></span>Online</div>
	</div>
	<div class="clear"></div>
</div>
<div class="divider"></div>
{{-- <form role="search">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Search">
	</div>
</form> --}}
<ul class="nav menu">
	<li class="{{ request()->is('') ? 'active' : '' }}"><a href="/"><em class="fa fa-dashboard">&nbsp;</em>
			Dashboard</a>
		</li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
			<em class="fa fa-archive">&nbsp;</em> Data Barang & Bahan <span data-toggle="collapse" href="#sub-item-2"
				class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
		</a>
		<ul class="children collapse" id="sub-item-2">
			<li><a class="{{ request()->is('barang*') ? 'active' : '' }}" href="{{route('barang.index')}}">
					<span class="fa fa-arrow-right">&nbsp;</span> Data Barang
				</a>
			</li>
			<li><a class="{{ request()->is('bahanbaku*') ? 'active' : '' }}" href="{{route('bahanbaku.index')}}">
					<span class="fa fa-arrow-right">&nbsp;</span> Data Bahan Baku
				</a>
			</li>
		</ul>
	</li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
		<em class="fa fa-gavel">&nbsp;</em> Order Bahan <span data-toggle="collapse" href="#sub-item-3"
			class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
	</a>
	<ul class="children collapse" id="sub-item-3">
		<li><a class="{{ request()->is('rfq*') ? 'active' : '' }}" href="{{route('rfq.index')}}">
			<span class="fa fa-recycle">&nbsp;</span> Data RFQ
		</a>
		</li>
		<li><a class="{{ request()->is('po*') ? 'active' : '' }}" href="{{route('po.index')}}">
			<span class="fa fa-sellsy">&nbsp;</span> Data PO
		</a>
		</li>
	</ul>
</li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
			<em class="fa fa-shopping-cart">&nbsp;</em> Produksi Barang<span data-toggle="collapse" href="#sub-item-1"
				class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
		</a>
		<ul class="children collapse" id="sub-item-1">
			<li><a class="{{ request()->is('kasir*') ? 'active' : '' }}" href="{{route('kasir.index')}}">
					<span class="fa fa-calculator">&nbsp;</span> Data Kasir
				</a>
			</li>
			<li><a class="{{ request()->is('pemesanan*') ? 'active' : '' }}" href="{{route('pemesanan.index')}}">
				<span class="fa fa-envelope-open">&nbsp;</span> Detail Pemesanan
				</a>
			</li>
		</ul>
	</li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
		<em class="fa fa-truck">&nbsp;</em> Data Sales Order <span data-toggle="collapse" href="#sub-item-4"
			class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
	</a>
	<ul class="children collapse" id="sub-item-4">
		<li><a class="{{ request()->is('sale*') ? 'active' : '' }}" href="{{route('sale.index')}}">
				<span class="fa fa-calculator">&nbsp;</span> Kasir Sales
			</a>
		</li>
		<li><a class="{{ request()->is('quatation*') ? 'active' : '' }}" href="{{route('quatation.index')}}">
			<span class="fa fa-folder-o">&nbsp;</span> Quatation
			</a>
		</li>
		<li><a class="{{ request()->is('invoice*') ? 'active' : '' }}" href="{{route('invoice.index')}}">
			<span class="fa fa-envelope-open">&nbsp;</span> Invoice
			</a>
		</li>
	</ul>
	</li>

	<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
		<em class="fa fa-folder-open">&nbsp;</em> Accounting <span data-toggle="collapse" href="#sub-item-5"
			class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
	</a>
		<ul class="children collapse" id="sub-item-5">
			<li><a class="{{ request()->is('accounting*') ? 'active' : '' }}" href="{{route('accounting.index')}}">
					<span class="fa fa-file-text">&nbsp;</span> Rekap Customer
				</a>
			</li>
			<li><a class="{{ request()->is('accounting*') ? 'active' : '' }}" href="{{route('accounting.pengeluaran')}}">
					<span class="fa fa-file-text">&nbsp;</span> Rekap RFQ
				</a>
			</li>
		</ul>
	</li>
	<li><a class="{{ request()->is('bom*') ? 'active' : '' }}" href="{{route('bom.index')}}">
			<span class="fa fa-cogs">&nbsp;</span> Data Bom
		</a>
	</li>
	<li><a class="{{ request()->is('vendor*') ? 'active' : '' }}" href="{{route('datavendor.index')}}">
			<span class="fa fa-building">&nbsp;</span> Data Vendor
		</a>
	</li>
	
	<li><a class="{{ request()->is('customer*') ? 'active' : '' }}" href="{{route('customer.index')}}">
			<span class="fa fa-users">&nbsp;</span> Data Customer
		</a>
	</li>
	<li><a class="{{ request()->is('mad*') ? 'active' : '' }}" href="{{route('mad.index')}}">
		<span class="fa fa-check-circle">&nbsp;</span> Data Mad
	</a>
	</li>

</ul>
</div>
<!--/.sidebar-->