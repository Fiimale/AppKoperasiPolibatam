<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Models\nasabah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NasabahController extends Controller
{
    public function index(){

        $data = nasabah::all();
        return view('nasabah',[
            'data' => $data,
        ]);
    }
    public function read(Request $request)
    {
        $where = array('id' => $request->input('id'));
        $post = nasabah::where($where)->first(); 

        return response()->json($post);
    }

    public function create(Request $request)
    {
        $request->input('nama');
        $request->input('email');
        $request->input('password');

        $request->validate([
            'nama' => 'required',
            'email'=>'required|email',
            'password'=> 'required|min:6',
        ]);
        $nasabah = new User();
        $nasabah->nama = $request->nama;
        $nasabah->email = $request->email;
        $nasabah->password = Hash::make($request->password);
        $nasabah->role_id = '3';
        $nasabah->status_user = '1';
        $nasabah->status_anggota = '1';
        $nasabah->save();

        return response()->json([
            'status' => true,
            'info' => 'Success'
        ], 201);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
    
        $nasabah = User::findOrFail($id);
        
        $nasabah->nama = $request->input('nama');
        $nasabah->email = $request->input('email');
        
        $nasabah->save();
        
        return response()->json([
            'status' => true,
            'info' => 'Success'
        ]);
        
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        User::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'info' => 'Success'
        ]);
    }

    public function read_file(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $allowed_ext = ['xlsx','xls'];
            $checking = explode(".",$fileName);
            $file_expl = end($checking);
            if(in_array($file_expl,$allowed_ext)){
                $tempPath = $file->getRealPath();
                $spreedsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($tempPath);
                $data = $spreedsheet->getActiveSheet()->toArray();
        
                $tmp = "";
                $rownumber = 0;
                foreach($data as $row){
                    
                    if ($rownumber >= 4){
                        $tmp.="<tr>";
                        $tmp.="<td>".$row['0']."</td>";
                        $tmp.="<td>".$row['1']."</td>";
                        $tmp.="<td>".$row['2']."</td>";
                        $tmp.="<td>".$row['3']."</td>";
                        $tmp.="<td>".$row['4']."</td>";
                        $tmp.="<td>".$row['5']."</td>";
                        $tmp.="<td>".$row['6']."</td>";
                        $tmp.="<td>".$row['7']."</td>";
                        $tmp.="<td>".$row['8']."</td>";
                        $tmp.="<td>".$row['9']."</td>";
                        $tmp.="<td>".$row['10']."</td>";
                        $tmp.="<td>".$row['11']."</td>";
                        $tmp.="<td>".$row['12']."</td>";
                        $tmp.="<td>".$row['13']."</td>";
                        $tmp.="</tr>";
        
                    }
                    $rownumber++;
                }
                return "
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.&nbsp;Anggota</th>
                            <th>Nama&nbsp;Lengkap</th>
                            <th>Umur</th>
                            <th>L/W</th>
                            <th>Foto&nbsp;Profil</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>NIK&nbsp;KTP</th>
                            <th>Email</th>
                            <th>Tanggal&nbsp;Bergabung</th>
                            <th>Tanda&nbsp;Tangan</th>
                            <th>Tanggal&nbsp;Berhenti</th>
                            <th>Sebab&nbsp;Dipecat</th>
                        </tr>
                    </thead>
                    <tbody class='body_tabel'>
                        $tmp
                    </tbody>
                </table>
                    ";

            }else{
                return "<div class='message-error'><span>File yang anda pilih Tidak Valid</span></div>";
            }
        }else{
            return "<div class='message-error'><span>Tidak ada File</span></div>";
        }
    }
}
