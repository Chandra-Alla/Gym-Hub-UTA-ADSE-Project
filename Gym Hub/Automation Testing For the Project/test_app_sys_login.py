import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

class GymManagementSystemTest(unittest.TestCase):
    def setUp(self):
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)
        self.driver.get("http://localhost/adse/user_login.php")
        self.login()

    def tearDown(self):
        self.driver.quit()

    def login(self):
        username_input = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.NAME, "username"))
        )
        password_input = self.driver.find_element(By.NAME, "pwd")
        submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")

        username_input.send_keys("cena")
        password_input.send_keys("12345")
        submit_button.click()

        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h3"))
        )

    def test_view_exercises(self):
        self.driver.get("http://localhost/adse/view_gym.php")

        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.CLASS_NAME, "header"))
        )

        show_more_buttons = self.driver.find_elements(By.CSS_SELECTOR, ".card button")
        for button in show_more_buttons:
            # Open the link in a new tab using a script (this avoids the need to handle new windows opened by clicking)
            url = button.get_attribute('onclick').split("'")[1]  # Assuming the URL is in the onclick attribute
            self.driver.execute_script(f"window.open('{url}','_blank');")

            # Switch to the new tab and verify the URL
            original_window = self.driver.current_window_handle
            self.driver.switch_to.window(self.driver.window_handles[-1])
            self.assertTrue("youtube.com" in self.driver.current_url)
            self.driver.close()  # Close the new tab
            self.driver.switch_to.window(original_window)  # Switch back to the main window

if __name__ == '__main__':
    unittest.main()
