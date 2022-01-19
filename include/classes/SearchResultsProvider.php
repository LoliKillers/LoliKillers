<?php
class SearchResultsProvider
{
    private $con, $userName;

    public function __construct($con, $userName)
    {
        $this->con = $con;
        $this->userName  = $userName;
    }

    public function getResults($inputText)
    {
        $entities = EntityProvider::getSearchEntities($this->con, $inputText);

        $html = "<div class='previewCategories noScroll'>";
        $html .= $this->getResultHtml($entities);
        return $html . "</div>";
    }

    private function getResultHtml($entities)
    {
        if (sizeOf($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con, $this->userName);

        foreach ($entities as $entity) {
            $entitiesHtml .= $previewProvider->createEntityPreviewSqaure($entity);
        }

        return "<div class='category'>
                    <div class='entities'>
                            $entitiesHtml
                    </div>
                </div>";
    }
}