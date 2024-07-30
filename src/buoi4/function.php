<?php
function bbc($n, $c = 'red')
{
    ?>
    <table class="mx-auto" bgcolor='<?php echo $c ?>'>
        <tr>
            <td class="px-4 py-2 font-bold" colspan="3">Bảng cửu chương
                <?= $n ?>
            </td>
        </tr>
        <?php
        for ($i = 1; $i <= 9; $i++) {
            ?>
            <tr>
                <td class="px-4 py-2">
                    <?php
                    $result = $n * $i;
                    echo $n . ' x ' . $i . ' = ' . $result ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}