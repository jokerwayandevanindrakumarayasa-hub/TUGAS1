<?php


class Utility {
    
    
    public static function redirect($url, $msg = '', $prefill = []) {
        if (!empty($prefill)) {
            $_SESSION['prefill'] = $prefill;
        }
        if ($msg) {
            $_SESSION['flash']['message'] = $msg;
        }
        header("Location: " . BASE_URL . $url);
        exit();
    }

    
    public static function showFlash() {
        if (isset($_SESSION['flash'])) {
            echo '<div style="background: #eef; padding: 10px; border: 1px solid #ccd; margin-bottom: 10px;">' . 
                 htmlspecialchars($_SESSION['flash']['message']) . 
                 '</div>';
            unset($_SESSION['flash']);
        }
    }

    
    public static function getPrefill($keys = []) {
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $_SESSION['prefill'][$key] ?? '';
        }
        return $data;
    }

    public static function clearPrefill() {
        if (isset($_SESSION['prefill'])) {
            unset($_SESSION['prefill']);
        }
    }

    
    public static function showNav($pages = NAV_PAGES) {
        echo '<nav style="background:#333; padding:10px; margin-bottom:20px;">';
        echo '<ul style="list-style:none; display:flex; gap:15px; margin:0; padding:0;">';
        foreach ($pages as $item) {
            echo "<li><a href='{$item['url']}' style='color:white; text-decoration:none;'>{$item['title']}</a></li>";
        }
        echo '</ul>';
        echo '</nav>';
    }
}
