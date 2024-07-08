import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import NoSuchElementException, TimeoutException

class AdminLoginTest(unittest.TestCase):
    def setUp(self):
        # Set up Chrome options for better control during tests
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)
        self.driver.get("http://localhost/adse/admin_login.php")

    def tearDown(self):
        self.driver.quit()

    def test_admin_login(self):
        try:
            # Locating the admin login form elements
            username_input = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.NAME, "username"))
            )
            password_input = self.driver.find_element(By.NAME, "pwd")
            login_button = self.driver.find_element(By.NAME, "login_admin")

            # Enter login credentials for admin
            username_input.send_keys("admin")
            password_input.send_keys("admin")
            login_button.click()

            # Verify redirection to the admin dashboard
            WebDriverWait(self.driver, 10).until(
                EC.url_contains("home.php")  # Assuming the admin is redirected to an admin home page
            )

            # Check for a specific element on the admin page to confirm successful login
            header_text = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.TAG_NAME, "h3"))
            ).text
            self.assertIn("ADD GYM", header_text)  # Assuming there's an "Admin Dashboard" header

        except (NoSuchElementException, TimeoutException) as e:
            print(f"Test Failed: {e}")
            self.fail("Admin login failed or elements not found.")

if __name__ == "__main__":
    unittest.main()
