<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;

class IndexController extends AbstractActionController
{
	/**
	 * Entity manager.
	 * @var Doctrine\ORM\EntityManager
	 */
	private $entityManager;
	
	/**
     * Post manager.
     * @var Application\Service\PostManager 
     */
    private $postManager;

	public function __construct($entityManager, $postManager) 
    {
        $this->entityManager = $entityManager;
        $this->postManager = $postManager;
    }
	
	// This is the default "index" action of the controller. It displays the 
	// Posts page containing the recent blog posts.
	public function indexAction() 
    {
        $tagFilter = $this->params()->fromQuery('tag', null);
        
        if ($tagFilter) {
         
            // Filter posts by tag
            $posts = $this->entityManager->getRepository(Post::class)
                    ->findPostsByTag($tagFilter);
            
        } else {
            // Get recent posts
            $posts = $this->entityManager->getRepository(Post::class)
                    ->findBy(['status'=>Post::STATUS_PUBLISHED], 
                             ['dateCreated'=>'DESC']);
        }
        
        // Get popular tags.
        $tagCloud = $this->postManager->getTagCloud();
        
        // Render the view template.
        return new ViewModel([
            'posts' => $posts,
            'postManager' => $this->postManager,
            'tagCloud' => $tagCloud
        ]);
    }
}
