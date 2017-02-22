<?php namespace App\Presenter;

use Illuminate\Pagination\BootstrapThreePresenter;

class JQTablePresenter extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Zurb Foundation HTML.
     *
     * @return string
     */
    public function render()
    {
        if( ! $this->hasPages())
            return '';

        return sprintf(
            '<ul class="pagination">%s %s %s</ul>',
            $this->getPreviousButton('前一页'),
            $this->getLinks(),
            $this->getNextButton('后一页')
        );
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text);
        }

        // $url = $this->paginator->url(
        //     $this->paginator->currentPage() - 1
        // );
        $pageNo = $this->paginator->currentPage() - 1;
        $url = "javascript:page({$pageNo})";
        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (! $this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text);
        }

        // $url = $this->paginator->url($this->paginator->currentPage() + 1);
        $pageNo = $this->paginator->currentPage() + 1;
        $url = "javascript:page({$pageNo})";
        return $this->getPageLinkWrapper($url, $text, 'next');
    }

    protected function getPageLinkWrapper($url, $page, $rel = null)
    {
        if ($page == $this->paginator->currentPage()) {
            return $this->getActivePageWrapper($page);
        }

        return $this->getAvailablePageWrapper($url, $page, $rel);
    }

    /**
     * Get the links for the URLs in the given array.
     *
     * @param  array  $urls
     * @return string
     */
    protected function getUrlLinks(array $urls)
    {
        $html = '';

        foreach ($urls as $page => $url) {
            $url = "javascript:page({$page})";
            $html .= $this->getPageLinkWrapper($url, $page);
        }

        return $html;
    }
    
}