<?php

namespace App\Providers;

use App\Repositories\Account\AccountRepository;
use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Address\AddressRepository;
use App\Repositories\Address\AddressRepositoryInterface;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;

use App\Repositories\Advertisement\AdvertisementRepository;
use App\Repositories\Advertisement\AdvertisementRepositoryInterface;
use App\Repositories\Annotation\AnnotationRepository;
use App\Repositories\Annotation\AnnotationRepositoryInterface;
use App\Repositories\Bank\BankRepository;
use App\Repositories\Bank\BankRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\Basket\BasketRepository;
use App\Repositories\Basket\BasketRepositoryInterface;
use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Bookmark\BookmarkRepository;
use App\Repositories\Bookmark\BookmarkRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Checkout\CheckoutRepository;
use App\Repositories\Checkout\CheckoutRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\CountryCode\CountryCodeRepository;
use App\Repositories\CountryCode\CountryCodeRepositoryInterface;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Coworker\CoworkerRepository;
use App\Repositories\Coworker\CoworkerRepositoryInterface;
use App\Repositories\Creator\CreatorRepository;
use App\Repositories\Creator\CreatorRepositoryInterface;
use App\Repositories\CreditCode\CreditCodeRepositoryInterface;
use App\Repositories\CreditCode\CreditCodeRepository;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Device\DeviceRepository;
use App\Repositories\Device\DeviceRepositoryInterface;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\Episode\EpisodeRepository;
use App\Repositories\Episode\EpisodeRepositoryInterface;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\FieldRepositoryInterface;
use App\Repositories\File\FileRepository;
use App\Repositories\File\FileRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Mobile\MobileRepository;
use App\Repositories\Mobile\MobileRepositoryInterface;
use App\Repositories\Navbar\NavbarRepository;
use App\Repositories\Navbar\NavbarRepositoryInterface;
use App\Repositories\Notification\NotificationRepository;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Orientation\OrientationRepository;
use App\Repositories\Orientation\OrientationRepositoryInterface;
use App\Repositories\Otp\OtpRepository;
use App\Repositories\Otp\OtpRepositoryInterface;
use App\Repositories\Package\PackageRepository;
use App\Repositories\Package\PackageRepositoryInterface;
use App\Repositories\Payment\PaymentRepository;
use App\Repositories\Payment\PaymentRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Publisher\PublisherRepository;
use App\Repositories\Publisher\PublisherRepositoryInterface;
use App\Repositories\Rate\RateRepository;
use App\Repositories\Rate\RateRepositoryInterface;
use App\Repositories\SalesRepresentative\SalesRepresentativeRepository;
use App\Repositories\SalesRepresentative\SalesRepresentativeRepositoryInterface;
use App\Repositories\Scratch\ScratchRepository;
use App\Repositories\Scratch\ScratchRepositoryInterface;
use App\Repositories\SearchHistory\SearchHistoryRepository;
use App\Repositories\SearchHistory\SearchHistoryRepositoryInterface;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Sound\SoundRepository;
use App\Repositories\Sound\SoundRepositoryInterface;
use App\Repositories\Subscription\SubscriptionRepository;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\Tax\TaxRepository;
use App\Repositories\Tax\TaxRepositoryInterface;
use App\Repositories\Ticketing\TicketingRepository;
use App\Repositories\Ticketing\TicketingRepositoryInterface;
use App\Repositories\Transfer\TransferRepository;
use App\Repositories\Transfer\TransferRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserProduct\UserProductRepository;
use App\Repositories\UserProduct\UserProductRepositoryInterface;
use App\Repositories\UserWatchLastPosition\UserWatchLastPositionRepository;
use App\Repositories\UserWatchLastPosition\UserWatchLastRepositoryInterface;
use App\Repositories\Video\VideoRepository;
use App\Repositories\Video\VideoRepositoryInterface;
use App\Repositories\Webinar\WebinarRepository;
use App\Repositories\Webinar\WebinarRepositoryInterface;
use App\Repositories\Wordpress\WordpressRepository;
use App\Repositories\Wordpress\WordpressRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
