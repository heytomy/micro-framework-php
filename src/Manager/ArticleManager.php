<?

namespace App\Controller;

use App\Manager\ArticleManager;
use Plugo\Controller\AbstractController;

class ArticleController extends AbstractController {

public function find(int $id) {
    return $this->readOne(Article::class, [ 'id' => $id ]);
}

public function findOneBy(array $filters) {
    return $this->readOne(Article::class, $filters);
}

public function findAll() {
    return $this->readMany(Article::class);
}

public function findBy(array $filters, array $order = [], int $limit = null, int $offset = null) {
    return $this->readMany(Article::class, $filters, $order, $limit, $offset);
}

public function add(Article $article) {
    return $this->create(Article::class, [
        'title' => $article->getTitle(),
        'description' => $article->getDescription(),
        'content' => $article->getContent()
    ]
    );
}

public function edit(Article $article) {
    return $this->update(Article::class, [
        'title' => $article->getTitle(),
        'description' => $article->getDescription(),
        'content' => $article->getContent()
      ],
      $article->getId()
    );
}


public function remove(Article $article) {
    return $this->delete(Article::class, $article->getId());
}

public function index() {
    $articleManager = new ArticleManager();
    return $this->renderView('article/index.php', [
      'articles' => $articleManager->findAll()
    ]);
  }

// public function add() {
//     if (!empty($_POST)) {
//       $article = new Article();
//       $articleManager = new ArticleManager();
//       $article->setTitle($_POST['title']);
//       $article->setDescription($_POST['description']);
//       $article->setContent($_POST['content']);
//       $articleManager->add($article);
//       return $this->redirectToRoute('article_index');
//     }
//     return $this->renderView('article/add.php');
//   }

}