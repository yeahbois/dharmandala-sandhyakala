import asyncio
from playwright.async_api import async_playwright, expect

async def main():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        page = await browser.new_page()

        # Get the absolute path to the file
        import os
        file_path = os.path.abspath('resources/views/pudobooth/queue.blade.php')

        await page.goto(f'file://{file_path}')

        # Wait for the main elements to be visible
        await expect(page.locator('h1')).to_have_text('Join the PudoBooth Queue')
        await expect(page.locator('label[for="nama"]')).to_have_text('Nama')
        await expect(page.locator('label[for="kelas"]')).to_have_text('Kelas')
        await expect(page.locator('label[for="no_telp"]')).to_have_text('No Telp')
        await expect(page.locator('button[type="submit"]')).to_be_visible()
        await expect(page.locator('.queue-status')).to_contain_text('Current queue: 0')

        await page.screenshot(path='jules-scratch/verification/queue_verification.png')

        await browser.close()

if __name__ == '__main__':
    asyncio.run(main())