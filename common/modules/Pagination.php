<?php

namespace common\modules;

class Pagination {
	protected $count;
	protected $postCountOnPage;
	protected $currentPage;
	protected $countPages;
	protected $start;
	protected $end;

	public function __construct($count, $currentPage, $postCountOnPage = 5, $length) {
		$this->count = $count;
		$this->postCountOnPage = $postCountOnPage;
		$this->currentPage = $currentPage ? $currentPage : 1;
		$this->length = $length;

		$this->countPages = ceil($this->count / $this->postCountOnPage);

		$this->start = 1;

		$this->end = $this->countPages;



	}

	public function getCount() {
		return $this->count;
	}

	public function getPostCountOnPage() {
		return $this->postCountOnPage;
	}	

	public function getCurrentPage() {
		return $this->currentPage;
	}

	public function getCountPage() {
		return $this->countPages;
	}

	public function getStart() {
		return $this->start;
	}
	public function getEnd() {
		return $this->end;
	}

}
