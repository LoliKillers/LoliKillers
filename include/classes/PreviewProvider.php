<?php

class PreviewProvider
{
    private $con;
    private $userName;

    public function __construct($con, $userName)
    {
        $this->con = $con;
        $this->userName = $userName;
    }

    public function createCategoryPreviewVideo($categoryId)
    {
        $entitiesArray = EntityProvider::getEntities($this->con, $categoryId, 1);

        if (sizeof($entitiesArray) == 0) {
            ErrorMessage::show('No TV Show to display');
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }

    public function createTVShowPreviewVideo()
    {
        $entitiesArray = EntityProvider::getTVShowEntities($this->con, null, 1);

        if (sizeof($entitiesArray) == 0) {
            ErrorMessage::show('No TV Show to display');
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }

    public function createMoviesPreviewVideo()
    {
        $entitiesArray = EntityProvider::getMoviesEntities($this->con, null, 1);

        if (sizeof($entitiesArray) == 0) {
            ErrorMessage::show('No movies to display');
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }

    public function createPreviewVideo($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        $videoId  = VideoProvider::getEntityVideoForUser($this->con, $id, $this->userName);
        $video = new Video($this->con, $videoId);

        $isInProgress = $video->isInProgress($this->userName);
        $playButtonText = $isInProgress ? 'Continue Watching' : 'Play';


        $seasonEpisode = $video->getSeasonAndEpisode();
        $subHeading = $video->isMovie() ? "" : "<h4> $seasonEpisode </h4>";

        return "<div class='previewContainer'>
                 <img src='$thumbnail' class='previewImage' hidden>
                    <video autoplay muted class='previewVideo' onended='previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>

                    <div class='previewOverlay'> 
                        <div class='mainDetails'>
                             <h3> $name </h3>
                                $subHeading
                            <div class='buttons'>
                                <button onclick='watchVideo($videoId)'> <i class='fas fa-play'></i> $playButtonText </button>
                                <button onClick='volumeToggle(this)'> <i class='fas fa-volume-mute'></i> </button>
                            </div>
                        </div>
                    </div>
                </div>";
    }

    public function createEntityPreviewSqaure($entity)
    {
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return "<a href='entity.php?id=$id'>
                    <div class='previewContainer small'>
                        <img src='$thumbnail' title='$name'> 
                    </div>
                </a>";
    }


    private function getRandomEntity()
    {
        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];
    }
}