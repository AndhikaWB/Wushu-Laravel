<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = User::count();
        $users = User::where('is_admin', 0)->count();
        $admins = User::where('is_admin', 1)->count();

        return view('dashboard', compact('categories', 'users', 'admins'));
    }
}

?>