<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
	  <ul class="pagination {{ (isset($small) && $small == true) ? 'pagination-sm' : '' }} mb0">
	      <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
	          <a href="{{ $paginator->url(1) }}{{ isset($_GET['entries']) ? '&entries='.$_GET['entries'] : '' }}" rel="first">First</a>
	      </li>
	      <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
	          <a href="{{ $paginator->url($paginator->currentPage()-1) }}{{ isset($_GET['entries']) ? '&entries='.$_GET['entries'] : '' }}">Prev</a>
	      </li>
	      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
	          <?php
	          $half_total_links = floor($link_limit / 2);
	          $from = $paginator->currentPage() - $half_total_links;
	          $to = $paginator->currentPage() + $half_total_links;
	          if ($paginator->currentPage() < $half_total_links) {
	             $to += $half_total_links - $paginator->currentPage();
	          }
	          if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
	              $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
	          }
	          ?>
	          @if ($from < $i && $i < $to)
	              <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
	                  <a href="{{ $paginator->url($i) }}{{ isset($_GET['entries']) ? '&entries='.$_GET['entries'] : '' }}">{{ $i }}</a>
	              </li>
	          @endif
	      @endfor
	      <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
	          <a href="{{ $paginator->url($paginator->currentPage()+1) }}{{ isset($_GET['entries']) ? '&entries='.$_GET['entries'] : '' }}" rel="next">Next</a>
	      </li>
	      <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
	          <a href="{{ $paginator->url($paginator->lastPage()) }}{{ isset($_GET['entries']) ? '&entries='.$_GET['entries'] : '' }}" rel="last">Last</a>
	      </li>
	  </ul>
@endif