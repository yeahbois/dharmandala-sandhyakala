import asyncio
from playwright.async_api import async_playwright, expect

async def main():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        # Grant camera permissions
        context = await browser.new_context(permissions=["camera"])
        page = await context.new_page()

        # Get the absolute path to the file
        import os
        file_path = os.path.abspath('resources/views/pudobooth/camera.blade.php')

        await page.goto(f'file://{file_path}')

        # Wait for the main elements to be visible
        await expect(page.locator('h1')).to_have_text('PudoBooth Camera')
        await expect(page.locator('#camera-container')).to_be_visible()
        await expect(page.locator('#controls')).to_be_visible()

        # Check for all the filter controls
        await expect(page.locator('label[for="brightness"]')).to_have_text('Brightness')
        await expect(page.locator('label[for="contrast"]')).to_have_text('Contrast')
        await expect(page.locator('label[for="saturate"]')).to_have_text('Saturation')
        await expect(page.locator('label[for="grayscale"]')).to_have_text('Grayscale')
        await expect(page.locator('label[for="sepia"]')).to_have_text('Sepia')
        await expect(page.locator('label[for="invert"]')).to_have_text('Invert')

        # Check for buttons
        await expect(page.locator('#shoot-button')).to_be_visible()
        await expect(page.locator('#save-button')).to_be_visible()
        await expect(page.locator('#change-layout-button')).to_be_visible()

        # Give the page a moment to render everything, especially if the camera feed was trying to load
        await page.wait_for_timeout(1000)

        await page.screenshot(path='jules-scratch/verification/camera_verification.png')

        await browser.close()

if __name__ == '__main__':
    asyncio.run(main())